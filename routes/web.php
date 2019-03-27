<?php

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
    Route::get('/','AdminPages@index');

    Route::get('category','CategoryController@index')->name('category.list');
    Route::get('category/Search','CategoryController@Search')->name('category.search');
    Route::post('category','CategoryController@Store')->name('category.store');
    Route::get('category/delete/{id}','CategoryController@destroy')->name('category.destroy');
});


