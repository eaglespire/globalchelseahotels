<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'name' => 'Joker',
            'email' => 'joker@gmail.com',
            'subject' => 'Booking of Space in Rhodaapartments',
            'message' => 'I would like to book a space in your hotel'
        ]);

        Contact::create([
            'name' => 'demo',
            'email' => 'demo@gmail.com',
            'subject' => 'How to book in Rhodaapartments Hotel',
            'message' => 'I would love to know how to book a space in your hotel'
        ]);
    }
}
