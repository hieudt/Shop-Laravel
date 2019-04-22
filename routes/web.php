<?php
use juno_okyo\Chatfuel;
use App\Product;
use App\Category;
use App\product_details;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Notification;
use App\User;
use App\Pages;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Swap\Laravel\Facades\Swap;
use Illuminate\Support\Facades\Cache;
use App\Bill;
use App\Detailsbill;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
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
Route::get('list', 'FrontEndController@list')->name('front.list');
Route::get('san-pham', 'FrontEndController@category2')->name('front.category');
Route::get('fetchdata/colorforsize', 'FrontEndController@fetchColor')->name('front.fetchcolor');
Route::get('fetchdata/size', 'FrontEndController@fetchSize')->name('front.fetchsize');
Route::get('/san-pham/{id}/{slug}', 'FrontEndController@productDetails');
Route::get('cart', 'CartController@cart')->name('cart.index');
Route::post('cart/store', 'CartController@store')->name('cart.store');
Route::post('cart/destroy', 'CartController@destroy')->name('cart.destroy');
Route::get('cart/load', 'CartController@show')->name('cart.show');
Route::post('cart/addcoupons', 'CartController@addCoupon')->name('cart.addcoupon');
Route::post('cart/removecoupons', 'CartController@removeCoupon')->name('cart.removecoupon');
Route::post('cart/checkout', 'CartController@checkout')->name('cart.checkout');
Route::post('cart/updatenumber', 'CartController@updateNumber')->name('cart.update');

Route::get('checkout', 'CheckOutController@index')->name('checkout.index');
Route::post('checkout/order', 'CheckOutController@postOrder')->name('checkout.order');
Route::get('checkout/bill/{token}', 'BillController@getDetailsbyId')->name('bill.detais');
Route::post('checkout/verifyPaypal', 'BillController@verifyPaypal')->name('bill.verifypaypal');

Route::get('session/idship/{id}', 'CartController@infoShiper');


Route::post('/users/login', 'FrontEndController@loginPost')->name('user.login');
Route::get('/users/logout', 'FrontEndController@logoutIndex')->name('front.logout');
Route::post('/users/signup', 'FrontEndController@signUpPost')->name('user.signup');

Route::get('/redirect/{social}', 'SocialFacebook@redirectToProvider')->name('facebook.login');;
Route::get('/callback/{social}', 'SocialFacebook@handleProviderCallback');

Route::get('/zalo/callback',function(){
    dd(request()->all());
});

Route::get('zalo/getfriends','ZaloSocial@getFriends')->name('zalo.getfriend');

Route::get('/admin/login', 'AdminPages@loginIndex');
Route::post('/admin/login', 'AdminPages@loginPost')->name('admin.login');
Route::get('/admin/logout', 'AdminPages@logoutIndex');

Route::group(['prefix' => 'users', 'middleware' => 'frontLogin'], function () {
    Route::get('/', 'UsersProfileController@index')->name('profile.index');
    Route::post('/users/update', 'UsersProfileController@update')->name('profile.update');
    Route::post('/users/changepass', 'UsersProfileController@changePass')->name('profile.changepass');
});

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
    Route::get('/bpc', function () {
        return view('admin.funcBPC');
    });

    Route::get('/', function () {
        return redirect('/admin/index');
    });
    Route::get('/index', 'AdminPages@index')->name('admin.index');
    Route::get('/bpc', 'AdminPages@bpc')->name('admin.bpc');
    Route::get('/kanban', 'AdminPages@kanban');
    Route::get('/erd', 'AdminPages@erd');
    Route::get('/fetchProduct', 'AdminPages@fetchTopProduct')->name('admin.fetchproduct');
    Route::get('/database','DatabaseController@index')->name('admin.db.index');
    Route::get('/social/zalo', 'ZaloSocial@index')->name('admin.zalo.index');

    Route::get('users', 'UserController@index')->name('users.list');
    Route::get('users/fetch', 'UserController@fetchAll')->name('users.fetch');
    Route::post('users/update', 'UserController@update')->name('users.update');
    Route::post('users/store', 'UserController@store')->name('users.store');

    Route::get('category', 'CategoryController@index')->name('category.list');
    Route::get('category/Search', 'CategoryController@Search')->name('category.search');
    Route::post('category', 'CategoryController@Store')->name('category.store');
    Route::get('category/delete/{id}', 'CategoryController@destroy')->name('category.destroy');
    Route::post('category/update', 'CategoryController@update')->name('category.update');

    Route::get('subcategory/Search', 'SubCategoryController@Search')->name('subcategory.search');
    Route::post('subcategory', 'SubCategoryController@store')->name('subcategory.store');
    Route::post('subcategory/update', 'SubCategoryController@update')->name('subcategory.update');
    Route::get('subcategory/delete/{id}', 'SubCategoryController@destroy')->name('subcategory.destroy');

    Route::get('chatlieu/Search', 'ChatLieuController@search')->name('chatlieu.search');
    Route::post('chatlieu', 'ChatLieuController@Store')->name('chatlieu.store');

    Route::get('coupons/', 'CouponsController@index')->name('coupons.list');
    Route::post('coupons/index', 'CouponsController@store')->name('coupons.store');
    Route::get('coupons/Search', 'CouponsController@search')->name('coupons.search');

    Route::get('product/add-product', 'ProductController@create')->name('product.create');
    Route::get('product/home', 'ProductController@index')->name('product.list');
    Route::get('product/search', 'ProductController@search')->name('product.search');
    Route::get('product/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::get('product/attribute', 'AdminPages@attIndex')->name('product.att.list');
    Route::get('product/brand', 'BrandController@index')->name('brand.home');
    Route::get('product/brand/list','BrandController@show')->name('brand.show');
    Route::post('product/brand', 'BrandController@store')->name('brand.store');
    Route::post('product/brand/update','BrandController@update')->name('brand.update');
    Route::get('product/brand/fetch','BrandController@fetch')->name('brand.fetch');
    


    Route::get('notification/getcount', 'NotificationController@getAllCountNotify')->name('notif.countall');
    Route::get('notification/del', function () {
        Notification::query()->update(['seen' => 1]);
    })->name('notif.del');

    Route::get('color/Search', 'ColorController@search')->name('color.search');
    Route::post('color/Store', 'ColorController@store')->name('color.store');

    Route::get('size/Search', 'SizeController@search')->name('size.search');

    
    Route::post('productdetails', 'ProductDetailsController@store')->name('productdetails.store');
    Route::post('productdetails/update/{id}', 'ProductDetailsController@update')->name('productdetails.update');

    Route::get('bill/list', 'BillController@show')->name('bill.show');
    Route::get('bill/fetch', 'BillController@fetchAll')->name('bill.fetch');
    Route::post('bill/updateStatus', 'BillController@updateStatus')->name('bill.updateStatus');
    Route::get('bill/details/{id}', 'BillController@showbillbyId');

    Route::get('menu','PagesController@index')->name('pages.index');
    Route::get('menu/fetch','PagesController@fetch')->name('pages.fetch');
    Route::get('menu/fetchdb','PagesController@fetchDb')->name('pages.fetchdb');
    Route::post('menu/update','PagesController@update')->name('pages.update');

    Route::get('shipper', 'ShipperController@index')->name('shipper.list');
    Route::get('shipper/fetch', 'ShipperController@fetchAll')->name('shipper.fetch');
    Route::post('shipper/update', 'ShipperController@update')->name('shipper.update');
    Route::post('shipper/store', 'ShipperController@store')->name('shipper.store');

    Route::get('getapi/minmax/{min}/{max}', 'ApiController@minmax')->name('getapi.minmax');
    Route::get('getapi/service/{msg}', 'ApiController@service')->name('getapi.service');

    Route::post('facebookservice/postFanpage', 'GraphController@publishToPage')->name('fb.page.post');
});


Route::get('checkProduct', function () {
    $data = User::all();
    foreach ($data as $usr) {
        $usr['SoBill'] = $usr->getCountBill($usr->id);
        $usr['TotalMoney'] = $usr->getTotalMoney($usr->id);
    }

    return response()->json($data);
});

Route::get('reset', function () {
    session()->remove('notify');
});

Route::get('test', 'PayPalController@index');
Route::get('test2', 'PayPalController@paymentList');
Route::get('/checkout/billss/success', function () {
    echo "success";
});

Route::get('check', function () {
    $arr = getInfoByCategoryId(9, '2019-04-18');
    echo $arr;
});

Route::get('/cv', function () {
    $array = array();
    $count = 0;
    $to = Carbon::now('Asia/Ho_Chi_Minh');
    foreach (getListCategoryTop() as $key) {
        $output[] = ['DanhMuc' => $key->title, 'id' => $key->id];
    }
    foreach ($output as $key) {
        $to = Carbon::now('Asia/Ho_Chi_Minh');
        $to->addDay(1);
        for ($i = 0; $i <= 3; $i++) {
            $ar = $to->subDay(1)->toDateString();
            $output[$count]['Ngay' . $ar] = getInfoByCategoryId($output[$count]['id'], $ar);
        }
        $count++;
    }


    dd($output);
});

Route::get('/top', function () {

    $pages = Pages::nested()->get();
    dd($pages);
});
Route::get('test', function () {
    if (Cache::has('categorycache')) {
        $danhmuc = Cache::get('categorycache');
        view()->share('danhmuc', $danhmuc);
    } else {
        $danhmuc = Category::with('SubCategory')->get();
        Cache::put('categorycache', $danhmuc, 3);
        view()->share('danhmuc', $danhmuc);
    }
    return View::make('test', compact('danhmuc'));
});

Route::get('deletecache',function(){
    Cache::pull('categorycache');
});