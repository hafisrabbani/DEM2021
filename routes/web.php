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


Route::group(['middleware' => 'login'],function(){
    Route::get('/','indexController@index');
    Route::get('/tes','unitTesController@index');
    Route::get('/bid/history','bidController@history');
    Route::get('/bid/{id}','bidController@show');
    Route::post('/bid/{id}','bidController@store');
    Route::get('/bid','bidController@index');
    Route::post('/bid','bidController@create');
    Route::get('/bill','baseController@index');
    Route::get('/bill/wait-paid','baseController@show');
    Route::get('/bill/wait-paid/{id}','baseController@showDetail');
    Route::post('/bill/wait-paid/{id}','baseController@pay');
    Route::get('/alamat','baseController@alamatIndex');
    Route::post('/alamat','baseController@alamatPost');
    Route::get('/shipment','shipmentController@index');
    Route::post('/shipment','shipmentController@check');
    // Route::get('/shipment','shipmentController@index');
    Route::get('/seller','sellerController@index');
    Route::get('/seller/detail/{id}','sellerController@detail')->name('seller.detail');
    Route::post('/seller/detail/{id}','sellerController@store')->name('seller.detail.post');
    Route::get('/tes','bidController@timeOut');
    Route::get('/donate','donateController@index');
    Route::get('/donate/{id}','donateController@detail');
});

Route::prefix('admin')->group(function (){
    Route::get('/verifikasi/pay','verifikasiController@index')->name('admin.pembayaran');
    Route::post('/verifikasi/pay','verifikasiController@verifikasi')->name('admin.pembayaran');
    Route::get('/verifikasi/bid','verifikasiController@bid')->name('admin.bid');
    Route::post('/verifikasi/bid','verifikasiController@bidAction')->name('admin.bid');
    Route::post('/verifikasi/bid/stop','verifikasiController@bidStop')->name('admin.bidStop');
    Route::get('/verifikasi/winner','verifikasiController@win')->name('admin.win');
    Route::post('/verifikasi/winner','verifikasiController@winAction')->name('admin.win');
});

Route::get('/login','authController@index');
Route::post('/login','authController@loginPost');
Route::get('/register','authController@register');
Route::post('/register','authController@registerPost');
Route::get('/logout','authController@logout');
