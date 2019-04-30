<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                "id" => 1,
                "name" => "Chính sách",
                "slug" => "chinh-sach",
                "parent_id" => 0,
                "enableFooter" => 1,
                "enableMenu" => 0,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "id" => 2,
                "name" => "Quyền riêng tư",
                "slug" => "quyen-rieng-tu",
                "parent_id" => 1,
                "enableFooter" => 1,
                "enableMenu" => 0,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),

            ],
            [
                "id" => 3,
                "name" => "Mạng Xã Hội",
                "slug" => "mxh",
                "parent_id" => 1,
                "enableFooter" => 1,
                "enableMenu" => 0,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "id" => 4,
                "name" => "Sử dụng website",
                "slug" => "su-dung-web",
                "parent_id" => 1,
                "enableFooter" => 1,
                "enableMenu" => 0,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "id" => 5,
                "name" => "Hỗ trợ khách hàng",
                "slug" => "ho-tro-khach-hang",
                "parent_id" => 0,
                "enableFooter" => 1,
                "enableMenu" => 0,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "id" => 6,
                "name" => "Hướng dẫn mua hàng",
                "slug" => "huong-dan-mua-hang",
                "parent_id" => 5,
                "enableFooter" => 1,
                "enableMenu" => 0,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "id" => 7,
                "name" => "Hướng dẫn thanh toán",
                "slug" => "huong-dan-thanh-toan",
                "parent_id" => 5,
                "enableFooter" => 1,
                "enableMenu" => 0,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "id" => 8,
                "name" => "Hướng dẫn giao nhận",
                "slug" => "huong-dan-giao-nhan",
                "parent_id" => 5,
                "enableFooter" => 1,
                "enableMenu" => 0,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),

            ]
        ]);
    }
}
