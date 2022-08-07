<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::create([
            'name' => 'Joe doe',
            'email' => 'joe@gmail.com',
            'reviews' => 'My service at this hotel was very satisfying.',
            'rating' => 5
        ]);

        Testimonial::create([
            'name' => 'Demo moro',
            'email' => 'demo@gmail.com',
            'reviews' => 'Nice hotel service, i enjoyed my stay at rhodaapartments hotel.',
            'rating' => 4
        ]);
    }
}
