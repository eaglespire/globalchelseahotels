<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return AboutSection::create([
            'content' => '<h3>Rhonda Apartment</h3>
                        <p>Our Apartment is known for Standard
                         Services, Quality Delivery to our Customer
                          and Well Comfortable Atmosphere.</p> '
        ]);
    }
}