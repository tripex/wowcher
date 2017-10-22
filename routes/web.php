<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', function () {
    return view('home');
  });
  Route::get('test', 'StatisticsController@getRedeems');

  Route::group(['prefix' => 'vouchers'], function () {
    Route::get('', 'VoucherController@index');
    Route::get('create', 'VoucherController@create');
    Route::post('store', 'VoucherController@store');
    Route::get('{voucher}/edit', 'VoucherController@edit');
    Route::patch('{voucher}', 'VoucherController@update');
  });

  Route::group(['prefix' => 'campaigns'], function () {
    Route::get('', 'VoucherCampaignController@index');
    Route::get('create', 'VoucherCampaignController@create');
    Route::post('store', 'VoucherCampaignController@store');
  });

  Route::group(['prefix' => 'users'], function () {
    Route::get('', 'UserController@index');
    Route::patch('update', 'UserController@update');
    Route::patch('update-email', 'UserController@update_email');
    Route::patch('update-password', 'UserController@update_password');
    Route::patch('new-api-token', 'UserController@new_api_token');
  });
});