<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'WEB',
            'credits' => '5',
            'description' => 'First subject',
            'semester' => '1',
            'course_id' => '1'
        ]);

        DB::table('subjects')->insert([
            'name' => 'IT',
            'credits' => '6',
            'description' => 'Second subject',
            'semester' => '2',
            'course_id' => '1'
        ]);

        DB::table('subjects')->insert([
            'name' => 'Web dizajn',
            'credits' => '6',
            'description' => 'Second subject',
            'semester' => '1',
            'course_id' => '2'
        ]);
    }
}
