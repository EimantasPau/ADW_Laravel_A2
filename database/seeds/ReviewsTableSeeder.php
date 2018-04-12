<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i<1475; $i++){
            \App\Review::create([
                'user_id' => $faker->numberBetween(1, 1247),
                'product_id' => $faker->numberBetween(1, 700),
                'body' => $faker->sentence(10),
                'rating' => $faker->numberBetween(1,5),
                'created_at' => $faker->dateTimeBetween('-1 month', 'now')
            ]);
        }
    }
}
