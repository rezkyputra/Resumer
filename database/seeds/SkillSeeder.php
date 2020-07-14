<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i <200 ; $i++) { 
            DB::table('skills')->insert([
                'name' => $faker->randomElement(array ('Git', 'PHP', 'Laravel', 'Javascript', 'HTML', 'CSS', 'ReactJs', 'Bootstrap', 'Redux', 'Axios')),
                'userId' => $faker->numberBetween( 1,15 )
            ]);
        }
    }
}
