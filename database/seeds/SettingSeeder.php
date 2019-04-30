<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            ["theme_color"=>"#000000",
            "nameshop" => "THỜI TRANG HÀ NỘI",
            "addressshop" => "Hoàng Liệt , Hoàng Mai, Hà Nội",
            "phoneshop" => "84336001860",
            "fblink" => "#",
            "twitterlink" => "#",
            "instagramlink" => "#",
            "youtubelink" => "#",
            "emailadmin" => "hieuleadergin@gmail.com"
            ,"created_at" =>  \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()]
        ]);
    }
}
