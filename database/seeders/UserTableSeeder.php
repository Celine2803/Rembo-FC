<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
    DB::table('users')->insert([

        [
            'name' => 'Director',
            'username'=> 'director',
            'email' => 'director@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'director',
            'status' => 'active'
        ],

        [
            'name' => 'Coach',
            'username'=> 'coach',
            'email' => 'coach@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'coach',
            'status' => 'active'
        ],

        [
            'name' => 'Player',
            'username'=> 'player',
            'email' => 'player@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'player',
            'status' => 'active'
        ],
    ]);
}
}