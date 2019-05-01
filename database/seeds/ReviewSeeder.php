<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Bill;
use App\Review;
use App\User;
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 20;

        $dataProduct = Product::all();
        $countProduct = count($dataProduct);
        $dataUser = User::all();
        $countUser = count($dataUser);

        foreach ($dataProduct as $item) {
            foreach ($dataUser as $user) {
                if ($this->hasOwnerProduct($item->id,$user)){
                    DB::table('reviews')->insert([
                        'id_product' => $item->id,
                        'id_users' => $user->id,
                        'content' => $faker->randomElement(['Được','Tôi thấy sản phẩm này khá tốt','Chấ t liệu cũng ok','Nói chung là tôi thích','Hơi chật','Cũng rộng phết đó','Ủng hộ Shop nhé']),
                        'rating' => $faker->biasedNumberBetween($min = 1,$max = 5),
                        "created_at" =>  date('Y-m-d H:i:s'),
                        "updated_at" => date('Y-m-d H:i:s'),
                    ]);
                }
            }
        }
    }

    public function hasOwnerProduct($idproduct,$datauser)
    {
        $data = $datauser->DetailsBill()->get();
        if (count($data) > 0) {
            foreach ($data as $item) {
                if ($item->product_details->Product->id == $idproduct && $item->Bill->statusPay == 1 && $item->Bill->status == 2) {
                    return true;
                    break;
                }
            }
            return false;
        }
        return false;
    }

}
