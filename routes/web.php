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

Route::get('/', function () {return redirect('home');});

Auth::routes();

// userログインしていたら
Route::group(['middleware' => 'auth:user'],function(){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/free', 'HomeController@free_index')->name('free');

    Route::group(['middleware' => ['auth','can:premier-only']],function(){

        Route::get('/premier', 'HomeController@premier_index')->name('premier');

    });

    


});

// admin認証不要
Route::group(['prefix' => 'admin'], function() {
    Route::get('/',function () { return redirect('/admin/home'); });
    Route::get('login','Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login','Admin\LoginController@login');
});

// adminログイン後
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout','Admin\LoginController@logout')->name('admin.logout');
    Route::get('home','Admin\HomeController@index')->name('admin.home');
});