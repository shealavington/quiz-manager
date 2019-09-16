<?php

use Illuminate\Database\Seeder;

class QuizzesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quizzes')->insert([
            'uuid' => 'd3d29d70-1d25-11e3-8591-034165a3a613',
            'user_id' => 1,
            'name' => 'General Knowledge',
            'description' => 'Random questions about random things.',
        ]);
    }
}
