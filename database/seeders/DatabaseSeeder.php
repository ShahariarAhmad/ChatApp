<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Musafir',
            'email' => 'one@one.com', 
            'password' => Hash::make(12341234) 
        ]);


        User::create([
            'name' => 'Beduyen',
            'email' => 'two@two.com', 
            'password' => Hash::make(12341234)
        ]);
    }
}
