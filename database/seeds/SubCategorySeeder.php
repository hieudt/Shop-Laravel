<?php

use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('SubCategory')->insert([
            [
                'id_category' => '1',
                'name_sub' => 'Áo sơ mi hàn quốc',
                'slug' => 'ao-so-mi-hanquoc',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '1',
                'name_sub' => 'Áo sơ mi họa tiết',
                'slug' => 'ao-so-mi-hoatiet',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '1',
                'name_sub' => 'Áo sơ mi caro',
                'slug' => 'ao-so-mi-caro',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '1',
                'name_sub' => 'Áo sơ mi ngắn tay',
                'slug' => 'ao-so-mi-ngantay',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '2',
                'name_sub' => 'Áo thun có cổ',
                'slug' => 'ao-thun-co-co',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '2',
                'name_sub' => 'Áo thun cổ tròn',
                'slug' => 'ao-thun-co-tron',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '2',
                'name_sub' => 'Áo thun cổ tím',
                'slug' => 'ao-thun-co-tim',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '2',
                'name_sub' => 'Áo thun tay dài',
                'slug' => 'ao-thun-tay-dai',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '2',
                'name_sub' => 'Áo thun ba lỗ',
                'slug' => 'ao-thun-ba-lo',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '3',
                'name_sub' => 'Áo khoác nỉ hàn quốc',
                'slug' => 'ao-khoac-ni-hanquoc',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '3',
                'name_sub' => 'Áo khoác da',
                'slug' => 'ao-khoac-da',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '3',
                'name_sub' => 'Áo khoác jean',
                'slug' => 'ao-khoac-jean',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '3',
                'name_sub' => 'Áo khoác kaki',
                'slug' => 'ao-khoac-kaki',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '3',
                'name_sub' => 'Áo khoác dù',
                'slug' => 'ao-khoac-du',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '4',
                'name_sub' => 'Quần Jean skinny',
                'slug' => 'quan-jean-skinny',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '4',
                'name_sub' => 'Quần Jean rách',
                'slug' => 'quan-jean-rach',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '4',
                'name_sub' => 'Quần Jean ống đứng',
                'slug' => 'quan-jean-ong-dung',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '5',
                'name_sub' => 'Quần Tây ống côn',
                'slug' => 'quan-tay-ong-con',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '6',
                'name_sub' => 'Quần Short Kaki',
                'slug' => 'quan-short-kaki',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '6',
                'name_sub' => 'Quần Short Tây',
                'slug' => 'quan-short-tay',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ], [
                'id_category' => '6',
                'name_sub' => 'Quần Short Thun',
                'slug' => 'quan-short-thun',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ],
        ]);
    }
}
