<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('Product')->insert([
                'id_sub' => $faker->biasedNumberBetween($min = 1,$max = 14),
                'id_chatlieu' => $faker->biasedNumberBetween($min = 1,$max = 4),
                'title' => 'Áo Phông '.$i,
                'slug' => 'ao-phong-'.$i,
                'description' => '<ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><li style="margin-bottom: 0.4em;">Form Unisex - Dáng xuông - Nam và Nữ đều mặc được </li><li style="margin-bottom: 0.4em;">Chất liệu 100% cotton tự nhiên xuất xịn </li><li style="margin-bottom: 0.4em;">Hình in đảm bảo không bong tróc sau khi giặt áo</li></ul><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">- Liên hệ mua sỉ : Add zalo - 0981065715 </p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"> </p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><b style="font-weight: bold;"><img data-thumb="original" original-height="983" original-width="2048" src="https://bizweb.dktcdn.net/100/315/239/files/bang-size-9e4b884c-c0c5-4aeb-ad9c-96fa5359f0e3.png?v=1535719509227" style="border-width: 0px; border-color: initial; border-image: initial; max-width: 100%; height: auto; margin: 0px;"></b></p>',
                'discount' => $faker->randomElement([0, 0, 10, 20, 30, 0, 0, 0, 0, 0]),
                'cost' => $faker->biasedNumberBetween($min = 5,$max = 60)."0000",
                'thumbnail' => $faker->randomElement(['ao.jpg','ao2.jpg','ao3.jpg','ao4.jpg','ao5.jpg','ao6.jpg']),
                'featured' => $faker->randomElement([0,1]),
                'id_brand' => $faker->randomElement([1,2,3]),
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);

            DB::table('Product')->insert([
                'id_sub' => $faker->biasedNumberBetween($min = 15, $max = 21),
                'id_chatlieu' => $faker->biasedNumberBetween($min = 1, $max = 4),
                'title' => 'Quần ' . $i,
                'slug' => 'quan-' . $i,
                'description' => '<ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: outside; list-style-image: initial; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><li style="margin-bottom: 0.4em;">Form Unisex - Dáng xuông - Nam và Nữ đều mặc được </li><li style="margin-bottom: 0.4em;">Chất liệu 100% cotton tự nhiên xuất xịn </li><li style="margin-bottom: 0.4em;">Hình in đảm bảo không bong tróc sau khi giặt áo</li></ul><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;">- Liên hệ mua sỉ : Add zalo - 0981065715 </p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"> </p><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; letter-spacing: 0.25px;"><b style="font-weight: bold;"><img data-thumb="original" original-height="983" original-width="2048" src="https://bizweb.dktcdn.net/100/315/239/files/bang-size-9e4b884c-c0c5-4aeb-ad9c-96fa5359f0e3.png?v=1535719509227" style="border-width: 0px; border-color: initial; border-image: initial; max-width: 100%; height: auto; margin: 0px;"></b></p>',
                'discount' => $faker->randomElement([0, 0, 10, 20, 30, 0, 0, 0, 0, 0]),
                'cost' => $faker->biasedNumberBetween($min = 5, $max = 60) . "0000",
                'thumbnail' => $faker->randomElement(['quan.jpg', 'quan2.jpg', 'quan3.jpg', 'quan4.jpg', 'quan5.jpg', 'quan6.jpg']),
                'featured' => $faker->randomElement([0, 1]),
                'id_brand' => $faker->randomElement([1, 2, 3]),
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]);
        }

    }
}
