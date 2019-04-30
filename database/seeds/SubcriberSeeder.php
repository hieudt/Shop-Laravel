<?php

use Illuminate\Database\Seeder;

class SubcriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcribers')->insert([
            [
                "email" => "emailsub1@gmail.com",
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
            [
                "email" => "emailsub2@gmail.com",
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],[
                "email" => "emailsub3@gmail.com",
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
