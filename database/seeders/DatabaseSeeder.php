<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('passw0rd')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example2.com',
            'password' => Hash::make('passw0rd')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example3.com',
            'password' => Hash::make('passw0rd')
        ]);
    }
}
