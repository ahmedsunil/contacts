<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Check if the admin user already exists
        $adminUser = User::where('email', 'faarish@mail.com')->first();

        if (!$adminUser) {
            // Create the admin user if it doesn't exist
            User::create([
                'name' => 'Faarish',
                'email' => 'faarish@mail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('root'), // Change this to a secure password
                'remember_token' => null,
            ]);

            $this->command->info('Admin user created successfully.');
        } else {
            $this->command->info('Admin user already exists.');
        }
    }
}
