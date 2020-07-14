<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class awardseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i <20 ; $i++) { 
            DB::table('awards')->insert([
                'name' => "Boocamp Dumways Batch ".$faker->numberBetween(1,15),
                'company' => "PT Dumbways.id",
                'startDate' => $faker->dateTimeBetween('-10 years', '-5 years'),
                'endDate' => $faker->dateTimeBetween('-5 years', '-1 years'),
                'userId' => $faker->numberBetween( 1,15 )
            ]);
        }
    }
}
