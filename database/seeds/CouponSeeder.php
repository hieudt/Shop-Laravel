<?php

use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 20;

        for($i = 0; $i < $limit; $i++){
            DB::table('coupons')->insert([
                'code' => 'ROG'.str_random(5),
                'Percent' => $faker->biasedNumberBetween($min = 10,$max = 50),
                'RequireTotal' => $faker->biasedNumberBetween($min = 1000,$max = 1000000),
                'Date' => $faker->dateTimeBetween('+0 days','+1 years'),
                'title' => 'Mã giảm giá',
                'thumbnail' => 'https://i2.wp.com/freepngimages.com/wp-content/uploads/2015/11/red-sale-transparent-background.png?fit=600%2C600',
                'typeEnable' => $faker->randomElement([0,1,2]),
                'content' => 'Content mã giảm giá',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
