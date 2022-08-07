<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
           'room_no' => 'R-12',
           'status'  => 'Avaliable',
           'name' => 'Classic Bed Rooms',
           'price' => '5000',
           'no_of_bed' => 3,
           'description' => 'One of the best room in our hotel.',
           'no_of_people' => 6,
        ]);

        Room::create([
            'room_no' => 'R-14',
            'status'  => 'Unavaliable',
            'name' => 'Sliver Bed Rooms',
            'price' => '10000',
            'no_of_bed' => 2,
            'description' => 'One of the best room in our hotel.',
            'no_of_people' => 3,
        ]);
    }
}