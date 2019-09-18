<?php

use Illuminate\Database\Seeder;

class QuizQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quiz_questions')->insert([
            'question' => 'What\'s the biggest search engine?',
            'quiz_id' => 1,
            'sort' => 2,
        ]);
        DB::table('quiz_questions')->insert([
            'question' => 'What\'s the legal drinking age in the UK?',
            'quiz_id' => 1,
            'sort' => 3,
        ]);
        DB::table('quiz_questions')->insert([
            'question' => 'Which company re-branded Santa Claus?',
            'quiz_id' => 1,
            'sort' => 1,
        ]);
    }
}
