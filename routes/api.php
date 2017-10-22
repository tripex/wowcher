<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'v1'], function () {
    Route::get('vouchers/redeem/{voucherCode}', 'Api\V1\VoucherApiController@redeem');

    Route::put('requests/update/{id}', 'ApiRequestController@update');
});
