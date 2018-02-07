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


/**
 *  Group of routes for 'Boss' role
 */
Route::group([], function (){
    
    Route::resource('/goods', 'GoodsController')->middleware('user:1');
    Route::post('/goods/{id}', 'GoodsController@update');
    
});
//    Route::get('/register-admin', 'AddUserController@createAdmin');
/**
 *  Group of routes for 'Manager' role
 */
Route::resource('/user', 'UserController')->middleware('user:1');
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



