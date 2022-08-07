<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Contact;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {


        $bookingSummary = Booking::select(
            DB::raw('month(check_in_date_time) as month'),
            DB::raw('day(check_in_date_time) as day'),
            DB::raw('count(*) as total_check_in_for_this_day'),           
        )->groupBy([DB::raw('day(check_in_date_time)'), DB::raw('month(check_in_date_time)')])
        ->get();
        $mapping = $bookingSummary->map(function($query) {
           return ['month' => $query->month, 'day' => $query->day, 'total_check_in' =>  $query->total_check_in_for_this_day]; 
        });
        
    //    dd($mapping->last()['month']);
       
      $linearchartbookings = Booking::select(
                  DB::raw('count(id) as bookingcount'),
                  DB::raw("DATE_FORMAT(check_in_date_time, '%m') as months ")
                  )
              ->whereYear('check_in_date_time', date('Y'))
              ->groupBy('months')
              ->get();

        $totalBooking = Booking::all()->count();
        $avaliableRooms = Room::avaliableRooms()->count();
        $unavaliableRooms = Room::unavaliableRooms()->count();
        $latestBooking = Booking::latestBooking();
        $totalFeedbacks = Testimonial::all()->count();
        $totalApprovedFeedbacks = Testimonial::approved()->get()->count();
        $totalNotApprovedFeedbacks = Testimonial::notApproved()->get()->count();
        $totalInboxMessage = Contact::all()->count();
        return view('dashboard.index', compact(
            'totalBooking',
            'avaliableRooms', 
            'unavaliableRooms', 
            'latestBooking', 
            'totalFeedbacks',
            'totalApprovedFeedbacks',
            'totalNotApprovedFeedbacks',
            'totalInboxMessage',
        ));
    }
}