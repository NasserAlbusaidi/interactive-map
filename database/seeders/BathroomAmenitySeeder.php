<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BathroomAmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('bathroom_amenity')->insert([
            [
                'bathroom_id' => 1,
                'amenity_id' => 1,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 2,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 3,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 4,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 5,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 6,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 7,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 8,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 9,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 10,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 11,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 12,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 13,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 14,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 15,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 16,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 17,
            ],

            [
                'bathroom_id' => 1,
                'amenity_id' => 19,
            ],
            [
                'bathroom_id' => 1,
                'amenity_id' => 18,
            ],
            [
                'bathroom_id' => 3,
                'amenity_id' => 1,
            ],
            [
                'bathroom_id' => 3,
                'amenity_id' => 5,
            ],
            [
                'bathroom_id' => 4,
                'amenity_id' => 1,
            ]

        ]);
    }
}
