<?php

use Illuminate\Http\Request;
use App\Models\Post;
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


Route::group(['prefix'=> 'v1','namespace'=>'Api'] , function () {



    Route::post('register' ,'AuthController@register');
    Route::post('login' ,'AuthController@login');

    Route::post('reset-password' ,'AuthController@resetPassword');
    Route::post('new-password' ,'AuthController@newPassword');


    Route::group(['middleware' => 'auth:api'], function () {

        Route::get('edit-profile' ,'AuthController@editProfile');
        Route::get('governorates','MainController@governorates');
        Route::get('cities','MainController@cities');
        Route::get('blood-types' ,'MainController@bloodType');
        Route::get('contacts' ,'MainController@contacts');

        Route::post('donation-create' ,'MainController@donationCreate');
        Route::get('donation-detalis' ,'MainController@donationDetalis');
        Route::get('donation-requests' ,'MainController@donationRequests');

        Route::get('notifications' ,'MainController@notifications');
        Route::post('notification-setting' ,'AuthController@notificationSettings');

        Route::post('register-token' ,'MainController@registerToken');
        Route::post('remove-token' ,'MainController@removeToken');

        Route::get('posts','MainController@posts');
        Route::post('post','MainController@post');
        Route::post('favourite-post','MainController@favouritePost');
        Route::get('list-favourite','MainController@listFavourite');

    });


});



