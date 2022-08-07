<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
            'email' => 'demo@example.com',
            'name' => 'Demo',
            'phone_no' => '0805468679',
            'gender' => 'Male',
        ]);

        User::create([
            'email' => 'widget@example.com',
            'name' => 'Widget',
            'phone_no' => '0805468679',
            'gender' => 'Female',
        ]);
    }
}