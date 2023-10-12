<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeding Categories
        DB::table('categories')->insert([
            ['name' => 'DEVS'],
            ['name' => 'Commercial'],
            ['name' => 'IT Admin'],
        ]);

        // Seeding Questions (Example for category_id = 1)
        // Seeding Questions
        DB::table('questions')->insert([
            ['category_id' => 1, 'text' => 'What is Laravel?', 'correct_answer_id' => 1],
            ['category_id' => 1, 'text' => 'What does MVC stand for?', 'correct_answer_id' => 5],
            ['category_id' => 2, 'text' => 'What is the difference between sales and marketing?', 'correct_answer_id' => 9],
            ['category_id' => 2, 'text' => 'What is ROI?', 'correct_answer_id' => 12],
            ['category_id' => 3, 'text' => 'What is the difference between a router and a switch?', 'correct_answer_id' => 14],
            ['category_id' => 3, 'text' => 'What does IP stand for?', 'correct_answer_id' => 17],
            ['category_id' => 3, 'text' => 'What is the difference between IPV4 and IPV6?', 'correct_answer_id' => 22],

            // ... Add more questions
        ]);

        // Seeding Answers
        DB::table('answers')->insert([
            // Answers for 'What is Laravel?' [1]
            ['text' => 'A PHP Framework', 'question_id' => 1],
            ['text' => 'A PHP Library', 'question_id' => 1],
            ['text' => 'A JavaScript Library', 'question_id' => 1],

            // Answers for 'What does MVC stand for?' [5]
            ['text' => 'Model View Character', 'question_id' => 2],
            ['text' => 'Model View Controller', 'question_id' => 2],
            ['text' => 'Model View Computer', 'question_id' => 2],

            // Answers for 'What is the difference between sales and marketing?' [9]
            ['text' => 'Sales is a subset of marketing', 'question_id' => 3],
            ['text' => 'Marketing is a subset of sales', 'question_id' => 3],
            ['text' => 'They are the same', 'question_id' => 3],

            // Answers for 'What is ROI?' [10]
            ['text' => 'Return On Investment', 'question_id' => 4],
            ['text' => 'Rate Of Interest', 'question_id' => 4],
            ['text' => 'Return On Interest', 'question_id' => 4],

            // Answers for 'What is the difference between a router and a switch?' [14]
            ['text' => 'A router is used to connect two or more networks while a switch is used to connect multiple devices on the same network', 'question_id' => 5],
            ['text' => 'A router is used to connect multiple devices on the same network while a switch is used to connect two or more networks', 'question_id' => 5],
            ['text' => 'They are the same', 'question_id' => 5],

            // Answers for 'What does IP stand for?' [17]
            ['text' => 'Internet Protocol', 'question_id' => 6],
            ['text' => 'Internet Provider', 'question_id' => 6],
            ['text' => 'Internet Port', 'question_id' => 6],

            // Annwers for 'What is the difference between IPV4 and IPV6?' [22]
            ['text' => 'IPV4 is 32 bit while IPV6 is 128 bit', 'question_id' => 7],
            ['text' => 'IPV4 is 128 bit while IPV6 is 32 bit', 'question_id' => 7],
            ['text' => 'They are the same', 'question_id' => 7],

            // ... Add more answers
        ]);




    }
}
