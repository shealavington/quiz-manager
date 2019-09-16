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
            'name' => 'Shea',
            'email' => 'shea@mailtrap.io',
            'password' => bcrypt('password1'),
            'email_verified_at' => '2019-09-16 12:28:16',
            'role' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Ben',
            'email' => 'ben@mailtrap.io',
            'password' => bcrypt('password2'),
            'email_verified_at' => '2019-09-16 12:28:16',
            'role' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'John',
            'email' => 'john@mailtrap.io',
            'password' => bcrypt('password3'),
            'email_verified_at' => '2019-09-16 12:28:16',
            'role' => '3',
        ]);
    }
}
