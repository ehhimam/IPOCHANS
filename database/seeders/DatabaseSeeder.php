<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        User::create([
            'nama'  => 'imam',
            'email' => 'imam@gmail.com',
            'nohp'  => '0896913078',
            'password'  => bcrypt('password')
        ]);

        User::factory(3)->create();
        Post::factory(3)->create();
        Category::factory(3)->create();
    }
}
