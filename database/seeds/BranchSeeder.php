<?php

use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'title' => 'Chanel',
                'slug' => 'chanel',
                'thumbnail' => 'channel.png',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),

            ],[
                'title' => 'Louis Vuitton',
                'slug' => 'louis-vuitton',
                'thumbnail' => 'lvv.png',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),

            ],[
                'title' => 'Dolce Gabanna',
                'slug' => 'dolce-gabanna',
                'thumbnail' => 'DG-Logo.jpg',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),

            ],
        ]);
    }
}
