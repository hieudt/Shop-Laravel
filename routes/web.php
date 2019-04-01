<?php
use juno_okyo\Chatfuel;
use App\Product;
use App\product_details;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::get('check',function(){
    return route('voyager.roles.index');
});


Route::group(['prefix' => 'admin'], function () {
    //Voyager::routes();
    Route::get('/index','AdminPages@index')->name('admin.index');

    Route::get('category','CategoryController@index')->name('category.list');
    Route::get('category/Search','CategoryController@Search')->name('category.search');
    Route::post('category','CategoryController@Store')->name('category.store');
    Route::get('category/delete/{id}','CategoryController@destroy')->name('category.destroy');
    Route::post('category/update','CategoryController@update')->name('category.update');

    Route::get('subcategory/Search','SubCategoryController@Search')->name('subcategory.search');
    Route::post('subcategory','SubCategoryController@store')->name('subcategory.store');
    Route::post('subcategory/update','SubCategoryController@update')->name('subcategory.update');
    Route::get('subcategory/delete/{id}','SubCategoryController@destroy')->name('subcategory.destroy');

    Route::get('chatlieu/Search','ChatLieuController@search')->name('chatlieu.search');
    Route::post('chatlieu','ChatLieuController@Store')->name('chatlieu.store');

    Route::get('product/add','ProductController@create')->name('product.create');
    Route::get('product/home','ProductController@index')->name('product.list');

    Route::get('color/Search','ColorController@search')->name('color.search');
    
    Route::get('size/Search','SizeController@search')->name('size.search');

    Route::post('productdetails/test','ProductDetailsController@test')->name('productdetails.test');

    Route::get('getapi/minmax/{min}/{max}','ApiController@minmax')->name('getapi.minmax');
    Route::get('getapi/service/{msg}','ApiController@service')->name('getapi.service');
});


Route::get('checkProduct',function(){
    $data = Product::all();
    $text = '';
        $productdetails = product_details::where('id_product',12)->get()->toArray();
        foreach ($productdetails as $pd) {
            $text .= "Soluong : ".$pd['soluong']."<br/>";
            $text .= "Color : ".$pd->Color->name;
            
        }
        
    echo $text;
});

Route::get('checkProduct2',function(){
    $data = Product::with('Color','Size','product_details')->where('id',12)->get()->toArray();
    $text = '';
    foreach ($data as $key) {
        $array = array();
        $i = 0;
        echo "Tên SP : ".$key['title']."</br>";
        echo "Giá SP : ".$key['cost']."<br/>";
        foreach ($key['color'] as $keys) {
            $array[$i] = "Màu : ".$keys['name']."|";
            $i++;
        }
        $i = 0;
        foreach($key['size'] as $keys){
            $array[$i] .= "Size : ".$keys['name']."|";
            $i++;
        }
        $i = 0;
        foreach($key['product_details'] as $keys){
            
            $array[$i] .=  "Số lượng : ".$keys['soluong']."|";
            $i++;
        }
        foreach($array as $ar){
            $text .= $ar ."\n";
        }
    }
    echo $text;

    echo "<hr/>";
    print_r($data);
 
    
});


