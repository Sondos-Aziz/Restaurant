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
Route::post('/reservation','ReservationController@reserve')->name('reservation.reserve');

Route::get('/', [
    'uses'=>'HomeController@index',
    'as'=>'product.index'
]);

Route::post('/contact','ContactController@sendMessage')->name('contact.send');
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function()
{
    Route::resource('Category','CategroyController');
    Route::resource('item','ItemController');
    Route::resource('slider','SliderController');
    Route::resource('userProfile','AdminController');
    Route::resource('dashboard','DashboardController');
    Route::get('reservation','ReservationController@index')->name('reservation.index');
    Route::post('reservation/{id}','ReservationController@status')->name('reservation.status');
    Route::delete('reservation/{id}','ReservationController@destory')->name('reservation.destory');
//    Route::resource('user','UserController');


    Route::resource('contact','ContactController');
});


Auth::routes();


Route::get('/home', 'HomeController@index2');


//for test
Route::get('/admin',function (){
   return 'u are admin';
})->middleware(['auth' , 'auth.admin']);

Route::get('/add-to-cart/{id}', [
    'uses'=>'ProductController@getAddToCart',
    'as'=>'product.addToCart'
]);

Route::get('/shopping-cart', [
    'uses'=>'ProductController@getCart',
    'as'=>'product.shoppingCart'
]);

Route::get('/remove/{id}', [
    'uses'=>'ProductController@getRemoveItem',
    'as'=>'product.remove'
]);

Route::get('/reduce/{id}', [
    'uses'=>'ProductController@getReduceByOne',
    'as'=>'product.reduceByOne'
]);

Route::get('/checkout', [
    'uses'=>'ProductController@getCheckout',
    'as'=>'checkout',
//    'middleware'=>'Auth'
]);
Route::post('/checkout', [
    'uses'=>'ProductController@postCheckout',
    'as'=>'checkout',
//    'middleware'=>'Auth'

]);
Route::group([ 'middleware'=>'auth'],function () {

    Route::get('/order', [
        'uses'=>'ProductController@getOrder',
        'as'=>'order',
//    'middleware'=>'Auth'

    ]);
    Route::post('/order', [
        'uses'=>'ProductController@postOrder',
        'as'=>'order',
//    'middleware'=>'Auth'

    ]);
});