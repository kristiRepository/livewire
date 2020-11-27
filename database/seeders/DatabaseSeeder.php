<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(1)->create();

        User::create([
            'name' => 'Kristi',
            'email' => 'k@gmail.com',
            'password' => Hash::make('123456')
        ]);

        Comment::create([
            'body' => 'First Comment',
            'user_id' => 1
        ]);
    }
}
