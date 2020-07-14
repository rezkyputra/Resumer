<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i <35 ; $i++) { 
            DB::table('portofolios')->insert([
                'name' => $faker->domainName,
                'img' => $faker->imageUrl(640, 480, 'cats'),
                'linkDemo' => $faker->domainName,
                'linkRepo' => $faker->url,
                'desc' => $faker->text(500),
                'userId' => $faker->numberBetween( 1,15 )
            ]);
        }
    }
}
