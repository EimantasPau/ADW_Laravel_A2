<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i<1270; $i++){
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => '',
                'created_at' => $faker->dateTimeBetween('-6 month', '6 month'),
                'avatar_url' => 'http://www.vincegolangco.com/wp-content/uploads/2010/12/batman-for-facebook.jpg'
            ]);
        }

    }
}