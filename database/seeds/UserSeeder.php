<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'trunghieu',
                'email'=>'rogteamvn@gmail.com',
                'password'=>bcrypt('123456'),
                'provider'=>'Root',
                'provider_id'=>'0',
                'role'=>1, 
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ],[
                'name' => 'Khách Vãng Lai',
                'email' => 'vanglai@gmail.com',
                'password' => bcrypt('123456'),
                'provider' => null,
                'provider_id' => null,
                'role' => 2,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ]
        ]);

        $faker = Faker\Factory::create('vi_VN');
        $limit = 100;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => bcrypt('123456'),
                'Address' => $faker->unique()->address,
                'Phone' => $faker->unique()->phoneNumber,
                'provider' => null,
                'provider_id' => null,
                'role' => 0,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ]);
        }
    }
}
