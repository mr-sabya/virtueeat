<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456')
        ]);
        
        // User seeder
        \App\Models\User::create([
            'first_name' => 'user',
            'last_name' => 'dev',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456')
        ]);
        \App\Models\User::create([
            'first_name' => 'merchant',
            'last_name' => 'dev',
            'email' => 'merchant@gmail.com',
            'password' => Hash::make('123456'),
            'user_type' => 1
        ]);
        
        // // Country seeder
        // \App\Models\Country::create([ 'name' => 'Australia' ]);
        // \App\Models\Country::create([ 'name' => 'Bangladesh' ]);
        
        // // City seeder
        // \App\Models\City::create([ 'name' => 'Sydney', 'country_id' => 1 ]);
        // \App\Models\City::create([ 'name' => 'Sydney', 'country_id' => 2 ]);
        
        // Category seeder
        \App\Models\Category::create([ 'name' => 'Food', 'slug' => 'food' ]);
        \App\Models\Category::create([ 'name' => 'Grocery', 'slug' => 'grocery' ]);

    }
}
