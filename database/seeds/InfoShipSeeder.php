<?php

use Illuminate\Database\Seeder;

class InfoShipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $limit = 100;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('InfoShip')->insert([
                'FullName' => $faker->name,
                'Email' => $faker->unique()->email,
                'Address' => $faker->unique()->address,
                'Phone' => $faker->unique()->phoneNumber,
                'Note' => null,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
