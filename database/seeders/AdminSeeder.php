<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'moh5408415@gmail.com',
            'password' => Hash::make('mohammed120232093'), // Use Hash::make to hash the password
            'role' => 'admin', // Set the role to "admin"
        ]);
    }
}
