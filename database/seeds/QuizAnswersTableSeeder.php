<?php

use Illuminate\Database\Seeder;

class QuizAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('quiz_answers')->insert([
            'question_id' => 1,
            'answer' => 'Yahoo',
            'is_correct' => 0
        ]);
        DB::table('quiz_answers')->insert([
            'question_id' => 1,
            'answer' => 'Google',
            'is_correct' => 1
        ]);
        DB::table('quiz_answers')->insert([
            'question_id' => 1,
            'answer' => 'Bing',
            'is_correct' => 0
        ]);
        DB::table('quiz_answers')->insert([
            'question_id' => 1,
            'answer' => 'Duck Duck Go',
            'is_correct' => 0
        ]);
        //
        DB::table('quiz_answers')->insert([
            'question_id' => 2,
            'answer' => 'Coca Cola',
            'is_correct' => 1,
            'sort' => 2
        ]);
        DB::table('quiz_answers')->insert([
            'question_id' => 2,
            'answer' => 'Apple',
            'is_correct' => 0,
            'sort' => 0
        ]);
        DB::table('quiz_answers')->insert([
            'question_id' => 2,
            'answer' => 'Argos',
            'is_correct' => 0,
            'sort' => 1
        ]);
        DB::table('quiz_answers')->insert([
            'question_id' => 2,
            'answer' => 'John Lewis',
            'is_correct' => 0,
            'sort' => 3
        ]);
        //
        DB::table('quiz_answers')->insert([
            'question_id' => 3,
            'answer' => '21',
            'is_correct' => 0,
            'sort' => 3
        ]);
        DB::table('quiz_answers')->insert([
            'question_id' => 3,
            'answer' => '16',
            'is_correct' => 0,
            'sort' => 1
        ]);
        DB::table('quiz_answers')->insert([
            'question_id' => 3,
            'answer' => '13',
            'is_correct' => 0,
            'sort' => 0
        ]);
        DB::table('quiz_answers')->insert([
            'question_id' => 3,
            'answer' => '18',
            'is_correct' => 1,
            'sort' => 2
        ]);
    }
}
