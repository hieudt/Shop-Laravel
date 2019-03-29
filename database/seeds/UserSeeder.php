<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'trunghieu','email'=>'rogteamvn@gmail.com','password'=>'123456'],
            ['name'=>'ngochoang','email'=>'rogteamvn2@gmail.com','password'=>'654321']
        ]);
    }
}
