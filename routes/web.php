<?php

/**
 *  Group for testing grid
 */

Route::get('/array', 'DatatablesController@index');
Route::get('/array-data', 'DatatablesController@data');

Route::get('/goods/data', 'GoodsController@data')->name('test');
//==============================================================================

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/adduser', 'AddUserController@index');

Route::post('/checkuser', 'SaveUserFieldsController@create');

Route::get('/', 'CheckUserController@index');

////Route::get('/goods/edit/{id}',['as' => 'goods.edit', "uses" =>'GoodsController@edit'])
////    ->name('goods_edit')
//;

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
//    Route::get('/goods/delete/{id}',["uses" =>'GoodsController@destroy'])->where('id', '[0-9]+');
    Route::post('/goods/{id}', 'GoodsController@update');
    
});

/**
 *  Group of routes for 'Manager' role
 */
Route::resource('/user', 'UserController');
Route::post('/user/{id}', 'UserController@update');

Route::group([], function (){
    
    Route::resource('/order', 'OrderController');
    Route::resource('/price', 'PriceController');
//    Route::delete('/user/{id}',["uses" =>'UserController@destroy'])->where('id', '[0-9]+');
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



