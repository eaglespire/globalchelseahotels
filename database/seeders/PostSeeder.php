<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'Post one',
            'body' => 'First post',
            'admin_id' => Admin::first()->id,
        ]);

        Post::create([
            'title' => 'Post two',
            'body' => 'Second post',
            'admin_id' => Admin::first()->id,
        ]);
    }
}