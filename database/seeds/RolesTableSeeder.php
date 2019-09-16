<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Edit',
            'description' => 'Thas the ability to add, delete and change questions and answers,',
        ]);

        DB::table('roles')->insert([
            'name' => 'View',
            'description' => 'Has the ability to view questions and answers, and Restricted',
        ]);

        DB::table('roles')->insert([
            'name' => 'Restricted',
            'description' => 'Has the ability to view questions only.',
        ]);
    }
}
