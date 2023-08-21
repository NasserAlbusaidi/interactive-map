<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       \DB::table('reviews')->insert(array(
            0 =>
            array(
                'bathroom_id' => 1,
                'author' => 'John Doe',
                'rating' => 5,
                'text' => 'This is a test review',

                'date' => now(),
            ),
            1 =>
            array(
                'bathroom_id' => 1,
                'author' => 'Jane Doe',
                'rating' => 4,
                'text' => 'This is another test review',

                'date' => now(),
            ),
            2 =>
            array(
                'bathroom_id' => 2,
                'author' => 'John Doe',
                'rating' => 5,
                'text' => 'This is a test review',

                'date' => now(),
            ),
            3 =>
            array(
                'bathroom_id' => 2,
                'author' => 'Jane Doe',
                'rating' => 4,
                'text' => 'This is another test review',

                'date' => now(),
            ),
            4 =>
            array(
                'bathroom_id' => 3,
                'author' => 'John Doe',
                'rating' => 5,
                'text' => 'This is a test review',

                'date' => now(),
            ),
            5 =>
            array(
                'bathroom_id' => 3,
                'author' => 'Jane Doe',
                'rating' => 1,
                'text' => 'i dont like this bathroom',

                'date' => now(),
            ),
            6 =>
            array(
                'bathroom_id' => 4,
                'author' => 'John Doe',
                'rating' => 5,
                'text' => 'Trip to the bathroom was great',
                'date' => now(),
            ),
            7 =>
            array(
                'bathroom_id' => 4,
                'author' => 'Jane Doe',
                'rating' => 4,
                'text' => 'i love this bathroom',

                'date' => now(),
            ),
       )

         );
    }
}
