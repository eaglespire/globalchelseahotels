<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Booking;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Chartisan\PHP\Chartisan;
use Illuminate\Support\Facades\DB;

class SalesChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        $bookingSummary = Booking::select(
            DB::raw('month(check_in_date_time) as month'),
            DB::raw('day(check_in_date_time) as day'),
            DB::raw('count(*) as total_check_in_for_this_day'),
        )->groupBy([DB::raw('day(check_in_date_time)'), DB::raw('month(check_in_date_time)')])
        ->get();
         $bookingSummaryArray = $bookingSummary->each(function ($query) {
                 ['month' => $query->month, 'day' => $query->day, 'total_check_in' =>  $query->total_check_in_for_this_day];
           
            });

        return   Chartisan::build()
            ->labels(['Jan', 'Feb', 'Mar'])
            ->dataset('Booking Summary', [$bookingSummary->each(function ($query) {
                 ['month' => $query->month, 'day' => $query->day, 'total_check_in' =>  $query->total_check_in_for_this_day];
           
            })])
            
            ->dataset('Sales', [3, 2, 4])
            ->dataset('Order', [3, 2, 4])
            ->dataset('Bok', [3, 2, 4])
            ->dataset('An', [3, 2, 4]);
        
            
    }

}