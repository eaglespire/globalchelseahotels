<?php

namespace Database\Seeders;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Booking::create([
           'user_id' => 1,
           'check_in_date_time' => Carbon::now(),
           'check_out_date_time' => Carbon::now()->addDays(2),
           'booking_type' => 'Online',
           'duration' => 2,
           'rooms' => ["1", "2"],
           'no_of_adult' => 3,
           'no_of_children' => 0,
           'no_of_rooms' => 3,
           'payment_type' => 'Card',
           'total_cost' => 8000
        ]);

        Booking::create([
            'user_id' => 2,
            'check_in_date_time' => Carbon::now(),
            'check_out_date_time' => Carbon::now()->addDays(2),
            'booking_type' => 'Offline',
            'duration' => 2,
            'rooms' => ["1"],
            'no_of_adult' => 3,
            'no_of_children' => 0,
            'no_of_rooms' => 3,
            'payment_type' => 'Transfer',
            'total_cost' => 8000
        ]);
    }
}