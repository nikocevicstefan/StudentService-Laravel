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
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role_id' => '1',
        ]);

        DB::table('users')->insert([
            'username' => 'profesor1',
            'email' => 'profesor1@gmail.com',
            'password' => Hash::make('professor'),
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'username' => 'student1',
            'email' => 'student1@gmail.com',
            'password' => Hash::make('student'),
            'role_id' => '3',
        ]);
    }
}
