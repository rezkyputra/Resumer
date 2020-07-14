<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i <50 ; $i++) { 
            DB::table('education')->insert([
                'name' => $faker->randomElement(array ('Universitas Indonesia','Universitas Gadja Madha','STMIK Dipanegara')),
                'majors' => $faker->randomElement(array ('Teknik Infomatika','sistem Informatika','TKJ')),
                'startDate' => $faker->dateTimeBetween('-10 years', '-5 years'),
                'endDate' => $faker->dateTimeBetween('-5 years', '-1 years'),
                'userId' => $faker->numberBetween( 1,15 )
            ]);
        }
    }
}
