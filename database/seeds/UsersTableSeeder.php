<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Shea Lavington',
            'email' => 'shealavington@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => '2019-09-16 12:28:16',
        ]);
    }
}
