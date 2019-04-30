<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Color')->insert([
            [
                'name' => 'Đỏ',
                'slug' => 'do',
                'codeColor' => 'red',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Vàng',
                'slug' => 'vang',
                'codeColor' => 'yellow',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Đen',
                'slug' => 'den',
                'codeColor' => 'black',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Trắng',
                'slug' => 'trang',
                'codeColor' => 'white',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'), 
            ],
            [
                'name' => 'Xanh',
                'slug' => 'xanh',
                'codeColor' => 'blue',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
