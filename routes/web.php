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



Route::get('/','HomeController@index')->name('welcome');




Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function()
{
    Route::resource('Category','CategroyController');
    Route::resource('item','ItemController');
    Route::resource('slider','SliderController');
    Route::resource('userProfile','AdminController');
    Route::resource('dashboard','DashboardController');

});

//Route::get('dashboard', function () {
//    return view('admin.dashboard');
//});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




