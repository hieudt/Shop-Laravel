<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
             //UserSeeder::class,
            // SettingSeeder::class,
            //ProviderConfigSeeder::class,
            //PageSeeder::class,    
            //SubcriberSeeder::class,
            // SizeSeeder::class,
            // ColorSeeder::class,
            // ChatLieuSeeder::class,
            // BranchSeeder::class,
            //CouponSeeder::class,
            //ShipperSeeder::class,
            //CategorySeeder::class,
            //SubCategorySeeder::class,
            //InfoShipSeeder::class,
            //ProductSeeder::class
            //ProductDetailsSeeder::class,
            BillSeeder::class,
        ]);
    }
}
