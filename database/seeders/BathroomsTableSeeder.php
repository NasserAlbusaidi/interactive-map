<?php

namespace Database\Seeders;

use App\Models\Bathroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BathroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \DB::table('bathrooms')->insert([
            [
                'name' => 'Muscat Public Bathroom',
                'address' => '123 Al Khuwair St, Muscat',
                'latitude' => 23.6100,
                'longitude' => 58.5400,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nizwa Restroom Facility',
                'address' => '456 Nizwa Souq Rd, Nizwa',
                'latitude' => 22.9333,
                'longitude' => 57.5333,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salalah Washroom Center',
                'address' => '789 Al Salam St, Salalah',
                'latitude' => 17.0151,
                'longitude' => 54.0924,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sur Public Convenience',
                'address' => '321 Al Ayjah Rd, Sur',
                'latitude' => 22.5667,
                'longitude' => 59.5289,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sohar Restroom',
                'address' => '654 Al Qurum St, Sohar',
                'latitude' => 24.3643,
                'longitude' => 56.7438,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ibri Sanitation Station',
                'address' => '987 Al Madina Rd, Ibri',
                'latitude' => 23.2254,
                'longitude' => 56.5159,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Khasab Washroom',
                'address' => '135 Al Suq Rd, Khasab',
                'latitude' => 26.1799,
                'longitude' => 56.2477,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }
}
