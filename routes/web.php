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

Route::get('/', 'FrontEndController@index');
Route::get('/san-pham/{id}/{slug}','FrontEndController@productDetails');

Route::get('check',function(){
    return route('voyager.roles.index');
});


Route::get('/admin/login','AdminPages@loginIndex');
Route::post('/admin/login','AdminPages@loginPost')->name('admin.login');
Route::get('/admin/logout','AdminPages@logoutIndex');

Route::group(['prefix' => 'admin','middleware'=>'adminLogin'], function () {
    Route::get('/bpc',function(){
        return view('admin.funcBPC');
    });
    //Voyager::routes();
   
    Route::get('/',function(){
        return redirect('/admin/index');
    });
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

    Route::get('coupons/index','CouponsController@index')->name('coupons.list');
    Route::post('coupons/index','CouponsController@store')->name('coupons.store');
    Route::get('coupons/Search','CouponsController@search')->name('coupons.search');

    Route::get('product/add','ProductController@create')->name('product.create');
    Route::get('product/home','ProductController@index')->name('product.list');
    Route::get('product/search','ProductController@search')->name('product.search');
    Route::get('product/edit/{id}','ProductController@edit')->name('product.edit');
    Route::get('product/attribute','AdminPages@attIndex')->name('product.att.list');


    Route::get('color/Search','ColorController@search')->name('color.search');
    Route::post('color/Store','ColorController@store')->name('color.store');

    Route::get('size/Search','SizeController@search')->name('size.search');

    Route::post('productdetails','ProductDetailsController@store')->name('productdetails.store');
    Route::post('productdetails/update/{id}','ProductDetailsController@update')->name('productdetails.update');

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
    $data = DB::table('Product')->where('slug','ao-phong-1')->get()->toArray();
    $data2 = Product::hydrate($data);
    dd($data2);
});


