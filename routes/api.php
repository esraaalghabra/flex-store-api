<?php

use App\Http\Controllers\Api\Shop\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['namespace' => 'Api',], function () {

    Route::group(['namespace' => 'Shop',], function () {

        Route::group(['prefix' => 'mainCategories',], function () {
            Route::get('/', [ShopController::class, 'index']);
        });
        Route::group(['prefix' => 'mainCategory',], function () {
            Route::get('/{id}', [ShopController::class, 'indexMainCategory']);
        });
        Route::group(['prefix' => 'subCategory',], function () {
            Route::get('/{id}', 'ShopController@indexSubCategory')->name('subCategory.index');
        });
        Route::group(['prefix' => 'vendor',], function () {
            Route::get('/{id}', 'ShopController@indexVendor')->name('vendor.index');
        });
        Route::group(['prefix' => 'product',], function () {
            Route::get('/{id}', 'ShopController@indexProduct')->name('product.index');
        });

    });

    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });

});
