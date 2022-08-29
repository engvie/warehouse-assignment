<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
         \App\Models\User::create([
            'name' => 'Albert Engvie',
            'email' => 'albert.engvie@gmail.com',
            'password' => \Hash::make('123456789'),
         ]);
    }
}
