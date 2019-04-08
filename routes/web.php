<?php
use juno_okyo\Chatfuel;
use App\Product;
use App\Category;
use App\product_details;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
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

Route::get('/', 'FrontEndController@index')->name('front.index');
Route::get('list','FrontEndController@list')->name('front.list');
Route::get('san-pham','FrontEndController@category2')->name('front.category');
Route::get('fetchdata/colorforsize','FrontEndController@fetchColor')->name('front.fetchcolor');
Route::get('fetchdata/size','FrontEndController@fetchSize')->name('front.fetchsize');
Route::get('/san-pham/{id}/{slug}','FrontEndController@productDetails');




Route::post('/users/login','FrontEndController@loginPost')->name('user.login');
Route::get('/users/logout','FrontEndController@logoutIndex')->name('front.logout');
Route::post('/users/signup','FrontEndController@signUpPost')->name('user.signup');

Route::get('/admin/login','AdminPages@loginIndex');
Route::post('/admin/login','AdminPages@loginPost')->name('admin.login');
Route::get('/admin/logout','AdminPages@logoutIndex');

Route::group(['prefix' => 'users'],function(){
    Route::get('/','UsersProfileController@index')->name('profile.index');
    Route::post('/users/update','UsersProfileController@update')->name('profile.update');
    Route::post('/users/changepass','UsersProfileController@changePass')->name('profile.changepass');
});

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
    
    $Product = DB::table('Product')
                ->join('SubCategory','Product.id_sub','=','SubCategory.id')
                ->join('categories','SubCategory.id_category','=','categories.id')
                ->join('product_details','Product.id','=','product_details.id_product')
                ->where('categories.id','2')->get();
    dd($Product);
});

Route::get('checkProduct2',function(){
    $data = DB::table('Product')->where('slug','ao-phong-1')->get()->toArray();
    $data2 = Product::hydrate($data);
    dd($data2);
});


