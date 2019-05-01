<?php
use juno_okyo\Chatfuel;
use App\Product;
use App\Category;
use App\product_details;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use \Firebase\JWT\JWT;
use App\Notification;
use App\User;
use GuzzleHttp\Client;
use Intervention\Image\ImageManagerStatic as Image;
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
Route::post('/reg','SubcriberController@store')->name('subcriber.store');
/* MODULE FB SERVICE */
Route::get('getapi/minmax/{min}/{max}', 'ApiController@minmax')->name('getapi.minmax');
Route::get('getapi/service/{msg}', 'ApiController@service')->name('getapi.service');
/* MODULE PRODUCT */
Route::get('san-pham', 'FrontEndController@category2')->name('front.category');
Route::get('fetchdata/colorforsize', 'FrontEndController@fetchColor')->name('front.fetchcolor');
Route::get('fetchdata/size', 'FrontEndController@fetchSize')->name('front.fetchsize');
Route::get('/san-pham/{id}/{slug}', 'FrontEndController@productDetails');

/* MODULE NEWS */
Route::get('tin-tuc/{slug}','FrontEndController@news')->name('news.load');

/* MODULE CART  */
Route::get('cart', 'CartController@cart')->name('cart.index');
Route::post('cart/store', 'CartController@store')->name('cart.store');
Route::post('cart/destroy', 'CartController@destroy')->name('cart.destroy');
Route::get('cart/load', 'CartController@show')->name('cart.show');
Route::post('cart/addcoupons', 'CartController@addCoupon')->name('cart.addcoupon');
Route::post('cart/removecoupons', 'CartController@removeCoupon')->name('cart.removecoupon');
Route::post('cart/checkout', 'CartController@checkout')->name('cart.checkout');
Route::post('cart/updatenumber', 'CartController@updateNumber')->name('cart.update');

/* MODULE WISHLIST */
Route::get('wishlist','WishlistController@wishlist')->name('wishlist.index');
Route::post('wishlist/store', 'WishlistController@store')->name('wishlist.store');
Route::get('wishlist/load', 'WishlistController@show')->name('wishlist.show');
Route::post('wishlist/destroy', 'WishlistController@destroy')->name('wishlist.destroy');
Route::post('wishlist/tocart','WishlistController@tocart')->name('wishlist.tocart');

/* MODULE CHECKOUT */
Route::get('checkout', 'CheckOutController@index')->name('checkout.index');
Route::post('checkout/order', 'CheckOutController@postOrder')->name('checkout.order');
Route::get('checkout/bill/{token}', 'BillController@getDetailsbyId')->name('bill.detais');
Route::post('checkout/verifyPaypal', 'BillController@verifyPaypal')->name('bill.verifypaypal');

/* CHECK SESSION */
Route::get('session/idship/{id}', 'CartController@infoShiper');

/* MODULE REVIEW */
Route::get('reviews','ReviewController@fetch')->name('review.fetch');
Route::post('reviews','ReviewController@store')->name('review.store');

/* MODULE USER */
Route::post('/users/login', 'FrontEndController@loginPost')->name('user.login');
Route::get('/users/logout', 'FrontEndController@logoutIndex')->name('front.logout');
Route::post('/users/signup', 'FrontEndController@signUpPost')->name('user.signup');
Route::get('/forgot','FrontEndController@forgotview');
Route::post('/forgot','Auth\ForgotPasswordController@sendmailForgot')->name('user.forgot');
Route::get('/users/forgotpass/tokenauth/{token}','Auth\ForgotPasswordController@forgotconfirm');
Route::post('/forgot/accept', 'Auth\ForgotPasswordController@forgotaccept')->name('forgot.accept');
/* MODULE SOCIAL */
Route::get('/redirect/{social}', 'SocialFacebook@redirectToProvider')->name('facebook.login');;
Route::get('/callback/{social}', 'SocialFacebook@handleProviderCallback');


/* AUTH LOGIN BACKEND */
Route::get('/admin/login', 'AdminPages@loginIndex');
Route::post('/admin/login', 'AdminPages@loginPost')->name('admin.login');
Route::get('/admin/logout', 'AdminPages@logoutIndex');

Route::group(['prefix' => 'users', 'middleware' => 'frontLogin'], function () {
    Route::get('/', 'UsersProfileController@index')->name('profile.index');
    Route::post('/users/update', 'UsersProfileController@update')->name('profile.update');
    Route::post('/users/changepass', 'UsersProfileController@changePass')->name('profile.changepass');
});

Route::get('/admin/safemode/tokenauth/{token}', 'SafeModeController@rememberauth');

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
    Route::get('/config','SettingsController@index');
    Route::post('/config/ui','SettingsController@updateui')->name('admin.config.update.ui');
    Route::post('/config/sociallinks','SettingsController@sociallinks')->name('admin.config.update.sociallinks');
   
    /* SOCIAL MODULE */
    Route::get('/social/zalo', 'ZaloSocial@index')->name('admin.zalo.index');
    Route::get('/social/zalo/getfriends', 'ZaloSocial@getFriends')->name('zalo.getfriend');
    Route::get('/social/zalo/getinfo', 'ZaloSocial@getInfo')->name('zalo.getinfo');
    Route::post('/social/zalo/sharelink','ZaloSocial@shareLink')->name('zalo.sharelink');

    Route::get('/social/facebook','GraphController@index')->name('admin.facebook.index');
    Route::get('/social/facebook/fetch','GraphController@fetch')->name('admin.facebook.fetch');
    Route::post('/social/facebook/scanemail','GraphController@scanEmail')->name('admin.facebook.scanemail');
    Route::post('/social/facebook/scanoption', 'GraphController@scanOption')->name('admin.facebook.scanoption');
    

    Route::get('/kenhbanhang', 'SocialController@index')->name('admin.zalo.index');
    Route::post('kenhbanhang/updatezalo','SocialController@updateZalo')->name('admin.zalo.update');
    Route::post('kenhbanhang/updatefacebook','SocialController@updateFacebook')->name('admin.facebook.update');

    /* SAFE MODE */
    Route::post('safemode/alertlog','SafeModeController@AlertLogin')->name('admin.safemode.alertlogin');
    
    Route::get('safemode/config','SafeModeController@config')->name('admin.safemode.config');
    Route::get('safemode/database','SafeModeController@database')->name('admin.safemode.dbview');
    Route::get('safemode/fetch','SafeModeController@dbfetch')->name('admin.safemode.db.fetch');
    Route::post('safemode/database/backup','SafeModeController@dbBackup')->name('admin.safemode.db.backup');
    Route::post('safemode/database/restore', 'SafeModeController@dbRestore')->name('admin.safemode.db.restore');
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
    Route::get('product/fetch','ProductController@fetch')->name('product.fetch');
    Route::get('product/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::get('product/attribute', 'AdminPages@attIndex')->name('product.att.list');
    Route::get('product/brand', 'BrandController@index')->name('brand.home');
    Route::get('product/brand/list','BrandController@show')->name('brand.show');
    Route::post('product/brand', 'BrandController@store')->name('brand.store');
    Route::post('product/brand/update','BrandController@update')->name('brand.update');
    Route::get('product/brand/fetch','BrandController@fetch')->name('brand.fetch');
    Route::post('product/postfacebook','GraphController@publishToPage')->name('product.upfacebook');

    Route::get('news/tintuc','NewsController@index')->name('news.list');
    Route::get('news/fetch','NewsController@fetch')->name('news.fetch');
    Route::get('news/add-news','NewsController@create')->name('news.create');
    Route::get('news/edit/{id}','NewsController@edit')->name('news.edit');
    Route::post('news/add-news','NewsController@store')->name('news.store');
    Route::post('news/edit/{id}','NewsController@update')->name('news.update');
    Route::get('news/delete/{id}', 'NewsController@destroy')->name('news.destroy');
    Route::get('news/sendmail/{id}','NewsController@sendmail');


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
    Route::post('menu/store','PagesController@store')->name('pages.store');
    Route::post('menu/updaterecord','PagesController@updaterecord')->name('pages.updaterecord');

    Route::get('shipper', 'ShipperController@index')->name('shipper.list');
    Route::get('shipper/fetch', 'ShipperController@fetchAll')->name('shipper.fetch');
    Route::post('shipper/update', 'ShipperController@update')->name('shipper.update');
    Route::post('shipper/store', 'ShipperController@store')->name('shipper.store');

    Route::get('reviews','ReviewController@index')->name('review.list');
    Route::get('reviews/fetchBackend','ReviewController@fetchBackend')->name('review.fetchbackend');
    Route::get('reviews/delete/{id}', 'ReviewController@destroy')->name('review.destroy');

    

    
});




Route::get('/clearcache', function () {
    Cache::flush();
   
});
Route::get('/add',function(){
    Schema::table('news', function ($table) {
        $table->softDeletes();
    });
});


Route::get('fb',function(){
    $client = new \GuzzleHttp\Client();
    
    $endpoint = "https://graph.facebook.com/491152857694713/";
    $response = $client->request('GET', $endpoint, ['query' => [
        'fields'=>'picture',
        'access_token' => 'EAASv7DwM85oBAI1rDGB4kPODCj6nZAiO5MpNvx9St3vNDYdfpjJ3QwvUHTXRQJmtcL34XgY6Dftnj8IUHkD6ZBwdNyk7h4Q8OzPt5RCwTaOnW03BhoFtToupvyxILvRBy4CqG8Y9XDB1uwrkdezW31oAumfUL1xKhl71OaYWMmReb8TvZALTSF9ZBLkpoMptygc20xKe2ycGEwel8ZA1yMerwTZBO3GXsZD',
    ]]);
    $statusCode = $response->getStatusCode();
    $content = $response->getBody();
    //dd($statusCode);
     $content = json_decode($response->getBody(),true);
     dd($content);
});

Route::get('fb2', function () {
    $categoryTop = getListCategoryTop(5);
    dd($categoryTop);
});

Route::get('fb3',function(){
    $msg = "HDSHOPdwdwROGTEAM1243";
    $pos = strpos($msg,"HDSHOPROGTEAM");
    if(strpos($msg, "HDSHOPROGTEAM") !== false){
        $id = explode("HDSHOPROGTEAM", $msg);
        echo $id[1];
    } else {
        echo "Error";
    }
});