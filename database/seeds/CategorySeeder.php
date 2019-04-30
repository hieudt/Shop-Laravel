<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'Áo sơ mi',
                'slug' => 'ao-so-mi',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ],[
                'title' => 'Áo thun',
                'slug' => 'ao-thun',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ],[
                'title' => 'Áo khoác',
                'slug' => 'ao-khoac',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'title' => 'Quần Jean',
                'slug' => 'quan-jean',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'title' => 'Quần Tây',
                'slug' => 'quan-tay',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'title' => 'Quần Short',
                'slug' => 'quan-short',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ],
        ]);
    }
}
