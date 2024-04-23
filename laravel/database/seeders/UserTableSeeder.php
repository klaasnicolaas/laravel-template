<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Super Admin
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        $admin->assignRole('Super Admin');

        // Moderator
        $moderator = User::factory()->create([
            'name' => 'Moderator',
            'email' => 'moderator@example.com',
        ]);
        $moderator->assignRole('Moderator');

        // User
        $user = User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
        ]);
        $user->assignRole('User');
    }
}
