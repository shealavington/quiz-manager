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
            'email' => 'shea@example.com',
            'password' => bcrypt('shea123'),
            'email_verified_at' => '2019-09-16 12:28:16',
            'role_id' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Ben',
            'email' => 'ben@example.com',
            'password' => bcrypt('ben123'),
            'email_verified_at' => '2019-09-16 12:28:16',
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'John',
            'email' => 'john@example.com',
            'password' => bcrypt('john123'),
            'email_verified_at' => '2019-09-16 12:28:16',
            'role_id' => '3',
        ]);
    }
}
