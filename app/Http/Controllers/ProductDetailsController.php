<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_details;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Images;

class ProductDetailsController extends Controller
{
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $SkuArray = $request->input('sku');
            $ColorArray = $request->input('selColor');
            $SizeArray = $request->input('selSize');


            $arr = array();

            foreach ($ColorArray as $key) {
                $arr[] .= $key;
            }

            for ($i = 0; $i < count($arr); $i++) {
                $arr[$i] .= $SizeArray[$i];
            }

            $arr2 = array_unique($arr); // Kiểm tra 2 set bị trùng
            if (count($arr) != count($arr2)) {
                return response('1', 422);
            }


            $this->validate(
                $request,
                [
                    'txtNameProduct' => 'required',
                    'rdoNoiBat' => 'required',
                    'txtSlugProduct' => 'unique:Product,slug',
                    'editordata' => 'required',
                    'Image1' => 'mimes:jpeg,png,jpg|required',
                    'sku.*' => 'required',
                    'selColor.*' => 'required',
                    'selSize.*' => 'required',
                    'number.*' => 'required|numeric',
                    'SelCat' => 'required',
                    'SelSubCat' => 'required',
                    'SelChatLieu' => 'required',
                    'SelBrand' => 'required',
                    'txtMoney' => 'numeric|required|min:1000',
                    'txtDiscount' => 'numeric|min:0|max:100'
                ],
                [
                    'SelBrand.required' => 'Vui lòng chọn thương hiệu',
                    'txtNameProduct.required' => 'Vui lòng điền tên sản phẩm',
                    'txtSlugProduct.unique' => 'Tên đường dẫn bị trùng',
                    'editordata.required' => 'Vui lòng ghi mô tả',
                    'Image1.mimes' => 'File tải lên phải là hình ảnh',
                    'Image1.required' => 'vui lòng tải lên ảnh chính',
                    'sku.*.required' => 'Vui lòng nhập SKU',
                    'selColor.*.required' => 'Vui lòng chọn màu sản phẩm',
                    'selSize.*.required' => 'Vui lòng chọn kích thước sản phẩm',
                    'number.*.required' => 'Vui lòng chọn số lượng sản phẩm',
                    'number.*.numeric' => 'Số lượng sản phẩm phải là số',
                    'SelCat.required' => 'Vui lòng chọn danh mục cha',
                    'SelSubCat.required' => 'Vui lòng chọn danh mục con',
                    'SelChatLieu' => 'Vui lòng chọn chất liệu sản phẩm',
                    'txtMoney.numeric' => 'Giá tiền phải là số',
                    'txtMoney.required' => 'Vui lòng nhập giá tiền',
                    'txtMoney.min' => 'Giá tiền phải lớn hơn 1000',
                    'txtDiscount.numeric' => 'Khuyến mãi phải là số ',
                    'txtDiscount.min' => 'Khuyến mãi ít nhất là 0%',
                    'txtDiscount.max' => 'Khuyến mãi tối đa 100',
                    'rdoNoiBat.required' => 'Vui lòng chọn trạng thái sản phẩm'
                ]
            );

            $Product = new Product;
            $Product->id_sub = $request->SelSubCat;
            $Product->id_chatlieu = $request->SelChatLieu;
            $Product->id_brand = $request->SelBrand;
            $Product->featured = $request->rdoNoiBat;
            if ($request->txtSlugProduct == '') {
                $slug = changeTitle($request->txtNameProduct);
                $Product->slug = $slug;
            } else {
                $Product->slug = $request->txtSlugProduct;
            }
            $Product->title = $request->txtNameProduct;
            $Product->description = $request->editordata;
            $Product->discount = $request->txtDiscount;
            $Product->cost = $request->txtMoney;
            $File = $request->file('Image1');
            $nameImage = $File->getClientOriginalName(); // lấy tên hình 
            $Image = str_random(4) . "_" . $nameImage;
            while (file_exists("images/product/" . $Image)) {
                $Image = str_random(4) . "_" . $nameImage;
            }
            $File->move("images/product", $Image);
            $Product->thumbnail = $Image;
            $Product->save();

            for ($i = 0; $i < count($request->input('sku')); $i++) {
                $ProductDetails = new product_details;
                $ProductDetails->id_product = $Product->id;
                $ProductDetails->id_color = $request->input('selColor')[$i];
                $ProductDetails->id_size = $request->input('selSize')[$i];
                $ProductDetails->sku = $request->input('sku')[$i];
                $ProductDetails->soluong = $request->input('number')[$i];

                $ProductDetails->save();
            }

            if ($request->hasFile('Image2')) {
                $File = $request->file('Image2');
                $nameImage = $File->getClientOriginalName(); // lấy tên hình 
                $Image = str_random(4) . "_" . $nameImage;
                while (file_exists("images/product/" . $Image)) {
                    $Image = str_random(4) . "_" . $nameImage;
                }
                $File->move("images/product", $Image);
                $Object = new Images;
                $Object->id_product = $Product->id;
                $Object->Link = $Image;
                $Object->save();
            }

            if ($request->hasFile('Image3')) {
                $File = $request->file('Image3');
                $nameImage = $File->getClientOriginalName(); // lấy tên hình 
                $Image = str_random(4) . "_" . $nameImage;
                while (file_exists("images/product/" . $Image)) {
                    $Image = str_random(4) . "_" . $nameImage;
                }
                $File->move("images/product", $Image);
                $Object = new Images;
                $Object->id_product = $Product->id;
                $Object->Link = $Image;
                $Object->save();
            }
            Log::info('Quản trị ' . Auth::user()->name . ' Đã thêm mới sản phẩm : '.$Product->title);
            return response()->json(['success' => 'Thêm mới thành công']);
        }
    }

    public function update(Request $request,$id)
    {
        if($request->ajax()){
            $Product = Product::find($id);

            $SkuArray = $request->input('sku');
            $ColorArray = $request->input('selColor');
            $SizeArray = $request->input('selSize');
            $IdSetArray = $Product->product_details;

            $arr = array();

            foreach ($ColorArray as $key) {
                $arr[] .= $key;
            }

            for ($i = 0; $i < count($arr); $i++) {
                $arr[$i] .= $SizeArray[$i];
            }

            $arr2 = array_unique($arr); // Kiểm tra 2 set bị trùng
            if (count($arr) != count($arr2)) {
                return response('1', 422);
            }
    
            $this->validate(
                $request,
                [
                    'txtNameProduct' => 'required',
                    'txtSlugProduct' => 'unique:Product,slug,'.$id,
                    'rdoNoiBat' => 'required',
                    'editordata' => 'required',
                    'Image1' => 'mimes:jpeg,png,jpg',
                    'sku.*' => 'required',
                    'selColor.*' => 'required',
                    'selSize.*' => 'required',
                    'number.*' => 'required|numeric',
                    'SelCat' => 'required',
                    'SelSubCat' => 'required',
                    'SelChatLieu' => 'required',
                    'SelBrand' => 'required',
                    'txtMoney' => 'numeric|required|min:1000',
                    'txtDiscount' => 'numeric|min:0|max:100'
                ],
                [
                    'SelBrand.required' => 'Vui lòng chọn thương hiệu',
                    'txtNameProduct.required' => 'Vui lòng điền tên sản phẩm',
                    'txtSlugProduct.unique' => 'Tên đường dẫnss bị trùng',
                    'editordata.required' => 'Vui lòng ghi mô tả',
                    'Image1.mimes' => 'File tải lên phải là hình ảnh',
                    'sku.*.required' => 'Vui lòng nhập SKU',
                    'selColor.*.required' => 'Vui lòng chọn màu sản phẩm',
                    'selSize.*.required' => 'Vui lòng chọn kích thước sản phẩm',
                    'number.*.required' => 'Vui lòng chọn số lượng sản phẩm',
                    'number.*.numeric' => 'Số lượng sản phẩm phải là số',
                    'SelCat.required' => 'Vui lòng chọn danh mục cha',
                    'SelSubCat.required' => 'Vui lòng chọn danh mục con',
                    'SelChatLieu' => 'Vui lòng chọn chất liệu sản phẩm',
                    'txtMoney.numeric' => 'Giá tiền phải là số',
                    'txtMoney.required' => 'Vui lòng nhập giá tiền',
                    'txtMoney.min' => 'Giá tiền phải lớn hơn 1000',
                    'txtDiscount.numeric' => 'Khuyến mãi phải là số ',
                    'txtDiscount.min' => 'Khuyến mãi ít nhất là 0%',
                    'txtDiscount.max' => 'Khuyến mãi tối đa 100',
                    'rdoNoiBat.required' => 'Vui lòng chọn trạng thái sản phẩm'
                ]
            );

            $Product->id_sub = $request->SelSubCat;
            $Product->featured = $request->rdoNoiBat;
            $Product->id_chatlieu = $request->SelChatLieu;
            $Product->id_brand = $request->SelBrand;
            if ($request->txtSlugProduct == '') {
                $slug = changeTitle($request->txtNameProduct);
                $Product->slug = $slug;
            } else {
                $Product->slug = $request->txtSlugProduct;
            }
            $Product->title = $request->txtNameProduct;
            $Product->description = $request->editordata;
            $Product->discount = $request->txtDiscount;
            $Product->cost = $request->txtMoney;

            if ($request->hasFile('Image1')) {
                $File = $request->file('Image1');
                $nameImage = $File->getClientOriginalName(); // lấy tên hình 
                $Image = str_random(4) . "_" . $nameImage;
                while (file_exists("images/product/" . $Image)) {
                    $Image = str_random(4) . "_" . $nameImage;
                }

                $File->move("images/product", $Image);
                if (!($Product->thumbnail)) {
                    unlink("images/product/".$Product->thumbnail);
                }
                $Product->thumbnail = $Image;
            }

            if ($request->hasFile('Image2')) {
                $File = $request->file('Image2');
                $nameImage = $File->getClientOriginalName(); // lấy tên hình 
                $Image = str_random(4) . "_" . $nameImage;
                while (file_exists("images/product/" . $Image)) {
                    $Image = str_random(4) . "_" . $nameImage;
                }

                $File->move("images/product", $Image);
                if (!empty($Product->Images[0])) {
                    unlink("images/product/".$Product->Images[0]->Link);
                    $Object = Images::find($Product->Images[0]->id);
                    $Object->Link = $Image;
                    $Object->save();
                } else {
                    $Object = new Images;
                    $Object->id_product = $id;
                    $Object->Link = $Image;
                    $Object->save();
                }
                
            }

            if ($request->hasFile('Image3')) {
                $File = $request->file('Image3');
                $nameImage = $File->getClientOriginalName(); // lấy tên hình 
                $Image = str_random(4) . "_" . $nameImage;
                while (file_exists("images/product/" . $Image)) {
                    $Image = str_random(4) . "_" . $nameImage;
                }

                $File->move("images/product", $Image);
                if (!empty($Product->Images[1])) {
                    unlink("images/product/".$Product->Images[1]->Link);
                    $Object = Images::find($Product->Images[1]->id);
                    $Object->Link = $Image;
                    $Object->save();
                } else {
                    $Object = new Images;
                    $Object->id_product = $id;
                    $Object->Link = $Image;
                    $Object->save();
                }
                
            }

            for($i = 0;$i < count($IdSetArray);$i++){
                $ProductDetails = product_details::find($IdSetArray[$i]->id);
                $ProductDetails->id_product = $Product->id;
                $ProductDetails->id_color = $ColorArray[$i];
                $ProductDetails->id_size = $SizeArray[$i];
                $ProductDetails->sku = $SkuArray[$i];
                $ProductDetails->soluong = $request->input('number')[$i];
                $ProductDetails->save();
            }
            $CountMore = count($SkuArray) - count($IdSetArray);
            if($CountMore > 0){
                for ($i = count($IdSetArray); $i < count($SkuArray); $i++) {
                    $ProductDetails = new product_details;
                    $ProductDetails->id_product = $Product->id;
                    $ProductDetails->id_color = $ColorArray[$i];
                    $ProductDetails->id_size = $SizeArray[$i];
                    $ProductDetails->sku = $SkuArray[$i];
                    $ProductDetails->soluong = $request->input('number')[$i];
                    $ProductDetails->save();
                }
            }
            

            $Product->save();
            Log::info('Quản trị ' . Auth::user()->name . ' Đã cập nhật sản phẩm : ' . $Product->title);
            return response()->json(['success' => 'Cập nhật thành công']);
        }
    }
}
