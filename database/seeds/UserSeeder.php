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
            ['name'=>'trunghieu','email'=>'rogteamvn@gmail.com','password'=>bcrypt('123456'),'provider'=>'Root','provider_id'=>'0']
        ]);
    }
}
