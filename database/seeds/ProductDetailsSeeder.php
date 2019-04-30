<?php

use Illuminate\Database\Seeder;

class ProductDetailsSeeder extends Seeder
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

        for ($i = 1; $i <= $limit; $i++) {
            for ($j=1; $j <= 4; $j++) { 
                DB::table('product_details')->insert([
                    'id_product' => $i,
                    'id_color' => $faker->unique(true)->randomElement([1,2,3,4,5]),
                    'id_size' => $j,
                    'sku' => 'SKU'.str_random(5),
                    'soluong' => $faker->biasedNumberBetween(20,100),
                    "created_at" =>  date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
