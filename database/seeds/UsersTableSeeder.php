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
        DB::table('users')->insert([
            'name' => 'Eimantas Pauzuolis',
            'email' => 'eimantas.pauzuolis@gmail.com',
            'password' => '',
            'role_id' => 1,
            'created_at' => $faker->dateTimeBetween('-6 month', '6 month'),
            'avatar_url' => 'http://www.vincegolangco.com/wp-content/uploads/2010/12/batman-for-facebook.jpg'
        ]);
        for($i = 0; $i<1270; $i++){
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'role_id' => 2,
                'password' => '',
                'created_at' => $faker->dateTimeBetween('-6 month', '6 month'),
                'avatar_url' => 'http://www.vincegolangco.com/wp-content/uploads/2010/12/batman-for-facebook.jpg'
            ]);
        }

    }
}
