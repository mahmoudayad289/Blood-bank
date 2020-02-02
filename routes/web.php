<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['middleware' => ['auth'], 'prefix' => 'admin'] , function () {


    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('governorates','GovernorateController');
    Route::resource('cities','CityController');
    Route::resource('categories','CategoryController');
    Route::resource('contacts','ContactController');
    Route::resource('posts','PostController');
    Route::resource('donations','DonationRequestController');
    Route::resource('clients','ClientController');
    Route::resource('settings','SettingController');
    Route::resource('users','UserController');
    Route::resource('roles','RoleController');
    Route::get('change-pass','UserController@changePass')->name('change.pass');
    Route::post('change-pass-save','UserController@changePassSave')->name('change.pass.save');
    Route::get('logout','UserController@logout')->name('user.logout');

});



Route::group(['namespace' => 'Front'], function () {

    Route::get('/', 'FrontController@index')->name('front.home');
    
    Route::get('/client-register', 'AuthController@showRegister')->name('register.client');
    Route::post('/client-register', 'AuthController@doRegister')->name('do.register');

    Route::get('/client-login', 'AuthController@showLogin')->name('login.client');
    Route::post('/client-login', 'AuthController@doLogin')->name('do.login');
    Route::get('logout','AuthController@logout')->name('client.logout');


    Route::get('/post/{id}', 'FrontController@post')->name('single.post');
    Route::get('/posts', 'FrontController@posts')->name('show.posts');


    Route::get('/donations', 'FrontController@donations')->name('all.donations');
    Route::get('/show-donation', 'FrontController@showDonation')->name('donation.show');
    Route::post('/create-donation', 'FrontController@createDonation')->name('donation.create');
    Route::get('/donation/{id}', 'FrontController@detailsDonation')->name('donation.details');


    Route::get('/about-us', 'FrontController@aboutUs')->name('about.us');
    Route::get('/show-contact', 'FrontController@showContact')->name('show.contact');
    Route::post('/show-contact', 'FrontController@contactUs')->name('contact.us');



    Route::group(['middleware' => 'auth:site_client'], function () {



        Route::get('toggle-Favourite', 'FrontController@toggleFavourite')->name('toggle.favourite');



    });




});
