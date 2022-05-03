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

Route::group(['namespace'=>'Api'],function (){

    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');
    Route::get('governorate','MainController@governorates');
    Route::post('reset','AuthController@resetPassword');
    Route::post('new-pass','AuthController@newpassword');



});

Route::group(['middleware'=>'auth:api','namespace'=>'Api'],function (){

   Route::get('posts','MainController@posts');
   Route::get('city','MainController@cities');
   Route::get('getRequestDonation','MainController@getRequestDonation');
   Route::post('postRequestDonation','MainController@postRequestDonation');
   Route::post('profile','MainController@profile');
   Route::get('fav list','SettingController@getFavorite');
   Route::post('toggle-favorite-list','SettingController@toggleFavoritelist');
   Route::post('contact-us','SettingController@contactus');
   Route::get('settings','SettingController@settings');
   Route::post('report','SettingController@report');

    //       -------Api Notification------------------

   Route::post('registertoken','NotificationController@registerToken');
   Route::post('removetoken','NotificationController@removeToken');


});





