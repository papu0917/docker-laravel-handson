<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/{any}', function () {
//     return view('app');
// })->where('any', '.*');


Route::get('/', function () {
    logger('welcome route.');
    return view('shop');
});

Route::get('/', 'ShopController@index');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/mycart', 'ShopController@myCart');
    Route::post('/mycart', 'ShopController@addMycart');
    Route::post('/confirm', 'ShopController@confirm');
    Route::post('/cartdelete', 'ShopController@deleteCart');
    Route::post('/checkout', 'ShopController@checkout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/mypage', 'MypageController@index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect('/admin/home');
    });
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/shop', 'Admin\ShopController@index')->name('admin.shop');
    Route::post('/logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('/home', 'Admin\HomeController@index')->name('admin.home');
    Route::get('/store', 'Admin\ShopController@create')->name('admin.store');
    Route::post('/store', 'Admin\ShopController@store')->name('admin.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
