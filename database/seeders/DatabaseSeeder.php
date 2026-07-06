<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat User Admin Default
        User::updateOrCreate(
            ['email' => 'admin@cipamilk.com'],
            [
                'email_verified_at' => now(),
                'name' => 'Admin Cipamilk',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // 2. Buat User Konsumen Default
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'email_verified_at' => now(),
                'name' => 'Test User',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'konsumen',
            ]
        );

        $this->call([
            CipaMilkSeeder::class,
        ]);
    }
}
