<?php

use Illuminate\Database\Seeder;

class ShipperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Shipper')->insert([
            [
                'name' => 'GiaoHangNhanh',
                'fee' => '30000',
                'Time' => '4 giờ',
                'image' => 'https://lh3.googleusercontent.com/VuehqCNIv4HdUrhmmHoTDvxt7h7soowos4Fa1LTCsIHQY00Kr6Qcs4KIG7P36iopxA',
                'Display' => 1,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),

            ],[
                'name' => 'SuperShip',
                'fee' => '15000',
                'Time' => '8 giờ',
                'image' => 'https://is1-ssl.mzstatic.com/image/thumb/Purple114/v4/f5/dd/71/f5dd715a-e5ec-b78e-c23c-a357b89815b5/source/512x512bb.jpg',
                'Display' => 1,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),

            ],[
                'name' => 'FreeShip',
                'fee' => '0',
                'Time' => '1 ngày',
                'image' => 'https://static.proship.vn/uploads/news/2017/06/08/Proship.VN_1496904377.6963.png',
                'Display' => 1,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),

            ],[
                'name' => 'GoViet',
                'fee' => '35000',
                'Time' => '3 giờ',
                'image' => 'https://www.go-viet.vn/wp-content/uploads/2018/06/xe-may-2.png',
                'Display' => 1,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),

            ],
        ]);
    }
}
