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

use Illuminate\Support\Facades\Route;

    Route::group(['namespace'=>'Shop',],function (){
        Route::get('/','ShopController@index')->name('home');
        Route::group(['prefix'=>'mainCategory',],function (){
            Route::get('/{id}','ShopController@indexMainCategory')->name('mainCategory.index');
        });
        Route::group(['prefix'=>'subCategory',],function (){
            Route::get('/{id}','ShopController@indexSubCategory')->name('subCategory.index');
        });
        Route::group(['prefix'=>'vendor',],function (){
            Route::get('/{id}','ShopController@indexVendor')->name('vendor.index');
        });
        Route::group(['prefix'=>'product',],function (){
            Route::get('/{id}','ShopController@indexProduct')->name('product.index');
        });
    });





    Route::group(['namespace'=>'Shop'],function (){
        Route::get('/login','ShopController@getLogin')->name('user.get.login');
        Route::post('/login','ShopController@login')->name('user.login');
    });


