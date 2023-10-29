<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Student User',
            'email' => 'student@test.com',
            'password' => bcrypt('12345678'),
            'type' => 'student',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Trainer User',
            'email' => 'trainer@test.com',
            'password' => bcrypt('12345678'),
            'type' => 'trainer',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Executive User',
            'email' => 'executive@test.com',
            'password' => bcrypt('12345678'),
            'type' => 'executive',
        ]);

        // Voyager
        $this->call([
            VoyagerDatabaseSeeder::class,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Melih Kocatürk',
            'email' => 'melihkocaturk@gmail.com',
            'role_id' => 1,
            'password' => bcrypt('a1z9'),
        ]);
    }
}
