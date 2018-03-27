<?php

use Illuminate\Database\Seeder;

class SemestersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semesters')->insert([
            'name' => 'Prvi semestar',
            'course_id' => 1,
        ]);

        DB::table('semesters')->insert([
            'name' => 'Drugi semestar',
            'course_id' => 2,
        ]);

        DB::table('semesters')->insert([
            'name' => 'Treci semestar',
            'course_id' => 1,
        ]);
    }
}
