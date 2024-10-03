<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        UserType::create([
            'type_name' => 'Admin',
        ]);

        UserType::create([
            'type_name' => 'National Industry',
            'region' => 'National',
        ]);

        UserType::create([
            'type_name' => 'National Lecturer',
            'region' => 'National',
        ]);

        UserType::create([
            'type_name' => 'National Student',
            'region' => 'National',
        ]);

        UserType::create([
            'type_name' => 'International Industry',
            'region' => 'International',
        ]);
        
        UserType::create([
            'type_name' => 'International Lecturer',
            'region' => 'International',
        ]);


        User::create([
            'id_user_type' => 1,
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'complete_name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'mobile_phone' => '1234567890',
            'institution' => 'Admin',
            'front_degree' => 'Admin',
            'back_degree' => 'Admin',
        ]);
    }
}
