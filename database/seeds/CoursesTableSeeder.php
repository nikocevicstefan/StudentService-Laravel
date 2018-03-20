<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'name' => 'Inormacione Tehnologije'
        ]);

        DB::table('courses')->insert([
            'name' => 'Graficki Dizajn'
        ]);
    }
}
