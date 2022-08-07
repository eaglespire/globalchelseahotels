<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            BookingSeeder::class,
            PostSeeder::class,
            RoomSeeder::class,
            AboutSectionSeeder::class,
            TestimonialSeeder::class,
            ContactSeeder::class,
        ]);
    }
}