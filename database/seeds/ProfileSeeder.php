<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i <15 ; $i++) { 
            DB::table('profiles')->insert([
                'hobby' => $faker->randomElement(array ('Coding','Sleep','Eat', 'Gaming')),
                'gender' => $faker->randomElement(array ('male','female')),
                'country' => $faker->city,
                'summary' => $faker->text(500),
                'address' => $faker->address,
                'img' => $faker->imageUrl(640, 480, 'cats'),
                'placeOfBirth' => $faker->city,
                'dateOfBirth' => $faker->dateTimeBetween('-25 years', '-20 years'),
                'linkGit' => $faker->url,
                'linkFace' => $faker->url,
                'linkLinked' => $faker->url,
                'linkTwitter' => $faker->url,
                'userId' => $faker->unique()->numberBetween( 1,15 )
            ]);
        }
    }
}
