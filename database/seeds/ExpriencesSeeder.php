<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ExpriencesSeeder extends Seeder
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
            DB::table('expriences')->insert([
                'jobTitle' => $faker->jobTitle,
                'type' => $faker->randomElement(array ('Intership','Fulltime','Remote')),
                'company' => $faker->company,
                'startDate' => $faker->dateTimeBetween('-10 years', '-5 years'),
                'endDate' => $faker->dateTimeBetween('-5 years', '-1 years'),
                'userId' => $faker->numberBetween( 1,15 )
            ]);
        }
    }
}
