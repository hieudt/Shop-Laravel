<?php

use Illuminate\Database\Seeder;

class ChatLieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ChatLieu')->insert([
            [
                'name' => 'Cotton',
                'slug' => 'Cotton',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Lụa',
                'slug' => 'Lua',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Vải',
                'slug' => 'Vai',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Len',
                'slug' => 'Len',
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
