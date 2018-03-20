<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'first_name' => 'Student',
            'last_name' => 'Studenovic',
            'birth_date' => '1995-07-03',
            'index' => '33-12',
            'course_id' => '1',
            'user_id' => '3',
        ]);
    }
}
