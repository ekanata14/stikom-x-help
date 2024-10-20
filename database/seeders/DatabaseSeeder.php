<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

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

        UserType::create([
            'type_name' => 'International Student',
            'region' => 'International',
        ]);

        // Seeder untuk tabel products
        Product::insert([
            [
                'user_type_id' => 2,
                'name' => 'Seminar (National Industry)',
                'description' => 'Seminar (National Industry)',
                'currency' => 'IDR',
                'price' => 600000.00,
                'quota' => 9999,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_type_id' => 5,
                'name' => 'Seminar (International Industry)',
                'description' => 'Seminar (International Industry)',
                'currency' => 'USD',
                'price' => 75.00,
                'quota' => 999,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_type_id' => 3,
                'name' => 'Seminar (National Lecturer)',
                'description' => 'Seminar (National Lecturer)',
                'currency' => 'IDR',
                'price' => 500000.00,
                'quota' => 999,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_type_id' => 6,
                'name' => 'Seminar (International Lecturer)',
                'description' => 'Seminar (International Lecturer)',
                'currency' => 'USD',
                'price' => 75.00,
                'quota' => 999,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_type_id' => 4,
                'name' => 'Seminar (National Student)',
                'description' => 'Seminar (National Student)',
                'currency' => 'IDR',
                'price' => 450000.00,
                'quota' => 999,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_type_id' => 7,
                'name' => 'Seminar (International Student)',
                'description' => 'Seminar (International Student)',
                'currency' => 'USD',
                'price' => 75.00,
                'quota' => 999,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);


        User::create([
            'id_user_type' => 1,
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'complete_name' => 'Admin',
            'email' => 'admin@esgbali.org',
            'password' => bcrypt('a@dm)n35Gb@l)2o2d'),
            'mobile_phone' => '1234567890',
            'institution' => 'Admin',
            'occupation' => 'Admin',
            'identity_id' => '1234567890',
            'identity_card' => '1234567890',
        ]);
    }
}
