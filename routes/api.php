<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Subscriber routes
Route::group(['namespace' => 'Subscriber'], function () {
    Route::post('/subscribe/{topic}', 'CreateSubscriptionController@create')->name('create-subscription');
});

// Publisher routes
Route::group(['namespace' => 'Publisher'], function () {
    Route::post('/publish/{topic}', 'PublishMessageController@create')->name('publish-message');
});
