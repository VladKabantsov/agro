<?php

/**
 *  Group for testing grid
 */

Route::get('/array', 'DatatablesController@index');
Route::get('/array-data', 'DatatablesController@data');

Route::get('/goods/data', 'GoodsController@data')->name('test');
//==============================================================================

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/adduser', 'AddUserController@index');

Route::post('/checkuser', 'SaveUserFieldsController@create');

Route::get('/', 'CheckUserController@index');

//Route::get('/', function(){
//
//    return view('layouts.agro_layout');
//});

//Route::get('/adduser', function(){
//
//    return view('auth.register');
//});

/**
 *  Group of routes for 'Boss' role
 */
Route::group([], function (){
    
    Route::resource('/goods', 'GoodsController');
    
});

/**
 *  Group of routes for 'Manager' role
 */
Route::group([], function (){
    
    Route::resource('/order', 'OrderController');
    Route::resource('/price', 'PriceController');
    Route::resource('/user', 'UserController');
});

/**
 *  Group of routes for 'Cashier' role
 */
Route::group([], function (){
    
    Route::get('/logs', ['as' => 'logs.index', 'uses' => 'LogController@index']);
    
    Route::get('/warehouse', ['as' => 'warehouse.index', 'uses' => 'WarehouseController@index']);
    
    Route::post('/warehouse', [
        'as'   => 'warehouse.store',
        'uses' => 'WarehouseController@store'
    ]);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::post('/logout', 'LogoutController@logout');



