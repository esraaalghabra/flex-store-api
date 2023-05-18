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

    define('PAGINATION_COUNT',50);

    Route::group(['namespace'=>'Admin','middleware'=>'guest:admin'],function (){
        Route::get('login',"LoginController@getLogin")->name('get.admin.login');
        Route::post('login',"LoginController@login")->name('admin.login');
    });

    Route::group(['namespace'=>'Admin','middleware'=>'auth:admin'], function (){
        Route::get('/','DashboardController@index')->name('admin.dashboard');

        ######################### Begin Languages Route ########################
        Route::group(['prefix' => 'languages'], function () {
            Route::get('/','LanguagesController@index') -> name('admin.languages');
            Route::get('create','LanguagesController@create') -> name('admin.languages.create');
            Route::post('store','LanguagesController@store') -> name('admin.languages.store');
            Route::get('edit/{id}','LanguagesController@edit') -> name('admin.languages.edit');
            Route::post('update/{id}','LanguagesController@update') -> name('admin.languages.update');
            Route::get('delete/{id}','LanguagesController@destroy') -> name('admin.languages.delete');
            Route::get('changeStatus/{id}','LanguagesController@changeStatus') -> name('admin.languages.status');

        });
        ######################### End Languages Route ########################


        ######################### Begin Main Categories Routes ########################
        Route::group(['prefix' => 'main_categories'], function () {
            Route::get('/','MainCategoriesController@index') -> name('admin.maincategories');
            Route::get('create','MainCategoriesController@create') -> name('admin.maincategories.create');
            Route::post('store','MainCategoriesController@store') -> name('admin.maincategories.store');

            Route::get('edit/{id}','MainCategoriesController@edit') -> name('admin.maincategories.edit');
            Route::post('update/{id}','MainCategoriesController@update') -> name('admin.maincategories.update');
            Route::get('delete/{id}','MainCategoriesController@destroy') -> name('admin.maincategories.delete');
            Route::get('changeStatus/{id}','MainCategoriesController@changeStatus') -> name('admin.maincategories.status');
            Route::get('showVendors/{id}','MainCategoriesController@showVendors') -> name('admin.maincategories.show_vendors');

        });
        ######################### End  Main Categories Routes    ########################

        ################################## sub categories routes ######################################
        Route::group(['prefix' => 'sub_categories'], function () {
            Route::get('/', 'SubCategoriesController@index')->name('admin.subcategories');
            Route::get('create', 'SubCategoriesController@create')->name('admin.subcategories.create');
            Route::post('store', 'SubCategoriesController@store')->name('admin.subcategories.store');
            Route::get('edit/{id}', 'SubCategoriesController@edit')->name('admin.subcategories.edit');
            Route::post('update/{id}', 'SubCategoriesController@update')->name('admin.subcategories.update');
            Route::get('update/{id}', 'SubCategoriesController@destroy')->name('admin.subcategories.delete');
            Route::get('delete/{id}', 'SubCategoriesController@changeStatus')->name('admin.subcategories.status');
            Route::get('showVendors/{id}','SubCategoriesController@showVendors') -> name('admin.subcategories.show_vendors');

        });

        ################################## end categories    #######################################


        ######################### Begin vendors Routes ########################
        Route::group(['prefix' => 'vendors'], function () {
            Route::get('/','VendorsController@index') -> name('admin.vendors');
            Route::get('create','VendorsController@create') -> name('admin.vendors.create');
            Route::post('store','VendorsController@store') -> name('admin.vendors.store');
            Route::get('edit/{id}','VendorsController@edit') -> name('admin.vendors.edit');
            Route::post('update/{id}','VendorsController@update') -> name('admin.vendors.update');
            Route::get('delete/{id}','VendorsController@destroy') -> name('admin.vendors.delete');
            Route::get('changeStatus/{id}','VendorsController@changeStatus') -> name('admin.vendors.status');
            Route::get('showProducts/{id}','VendorsController@showProducts') -> name('admin.vendors.show_products');

        });
        ######################### End  vendors Routes  ########################

        ######################### Begin Products Routes ########################
        Route::group(['prefix' => 'products'], function () {
            Route::get('/','ProductsController@index') -> name('admin.products');
            Route::get('create','ProductsController@create') -> name('admin.products.create');
            Route::post('store','ProductsController@store') -> name('admin.products.store');

            Route::get('edit/{id}','ProductsController@edit') -> name('admin.products.edit');
            Route::post('update/{id}','ProductsController@update') -> name('admin.products.update');
            Route::get('delete/{id}','ProductsController@destroy') -> name('admin.products.delete');
            Route::get('changeStatus/{id}','ProductsController@changeStatus') -> name('admin.products.status');

        });
        ######################### End  Products Routes  ########################

    });


