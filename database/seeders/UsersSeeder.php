<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'id' => '1', // This is the user id of the user who created the review
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
            ],
            [
                'id' => '2', // This is the user id of the user who created the review
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => bcrypt('password'),
            ],
        ];

        User::insert($user);
    }
}
