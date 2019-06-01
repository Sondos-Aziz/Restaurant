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


Auth::routes();
//Route::get('/login','HomeController@login')->name('login');
//Route::resource('login','HomeController');

Route::get('/home', 'HomeController@index2');

//Route::get('/home', 'HomeController@indexUser');

//for test
Route::get('/admin',function (){
   return 'u are admin';
})->middleware(['auth' , 'auth.admin']);

