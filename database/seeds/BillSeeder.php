<?php

use Illuminate\Database\Seeder;
use App\Bill;
use App\Shipper;
use App\Detailsbill;
use App\product_details;
class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $limit = 100;

        for ($i=1; $i <= $limit ; $i++) { 
            $Bill = new Bill;
            $Bill->status = $faker->randomElement([0,1,2,3]);
            $Bill->statusPay = $faker->randomElement([0,1]);
            $Bill->PayMethod = $faker->randomElement([0,1]);
            $Bill->id_user = $faker->biasedNumberBetween($min = 2,$max = 102);
            $Bill->id_coupon = null;
            $Bill->id_infoship = $faker->biasedNumberBetween($min = 1,$max = 100);
            $Bill->id_shipper = $faker->randomElement([1,2,3,4]);
            $Bill->feeship = Shipper::find($Bill->id_shipper)->fee;
            $Bill->TotalMoney = 0;
            $Bill->save();

            $number = $faker->randomElement([1,2,3,4]);
            $total = 0;
            for ($j=1; $j <= $number; $j++) { 
                $DetailsBill = new Detailsbill;
                $DetailsBill->id_bill = $Bill->id;
                $DetailsBill->id_products_details = $faker->unique(true)->biasedNumberBetween($min = 20,$max = 350);
                $DetailsBill->Number = $faker->randomElement([1,2,3]);
                $DetailsBill->discount = product_details::find($DetailsBill->id_products_details)->Product->discount;
                $DetailsBill->price = product_details::find($DetailsBill->id_products_details)->Product->cost;
                $total += priceDiscount($DetailsBill->price*$DetailsBill->Number,$DetailsBill->discount);
                $DetailsBill->save();
            }

            $UpdateBill = Bill::find($Bill->id);
            $UpdateBill->TotalMoney = $total;
            $UpdateBill->save();
            
        }
    }
}
