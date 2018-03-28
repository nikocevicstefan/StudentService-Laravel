<?php

use Illuminate\Database\Seeder;

class ProfessorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professors')->insert([
            'first_name' => 'Misko',
            'last_name' => 'Miskovic',
            'birth_date' => '1965-02-02',
            'office' => '5',
            'user_id' => '2',
        ]);

        DB::table('professors')->insert([
            'first_name' => 'Prof',
            'last_name' => 'Prof',
            'birth_date' => '1965-02-02',
            'office' => '5',
            'user_id' => '6',
        ]);
    }
}
