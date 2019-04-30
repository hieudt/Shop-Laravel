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
                'thumbnail' => 'http://assets.stickpng.com/thumbs/58429476a6515b1e0ad75acd.png',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),

            ],[
                'title' => 'Louis Vuitton',
                'slug' => 'louis-vuitton',
                'thumbnail' => 'https://png.pngtree.com/svg/20161124/63f410c59c.svg',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),

            ],[
                'title' => 'Dolce Gabanna',
                'slug' => 'dolce-gabanna',
                'thumbnail' => 'https://fontmeme.com/images/DG-Logo.jpg',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),

            ],
        ]);
    }
}
