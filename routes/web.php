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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/packages', 'HomeController@packages')->name('packages');
Route::get('/checkout/{id}', 'HomeController@checkout')->name('checkout');
Route::post('/buy_package', 'PackageController@sendRequest')->name('buy_package');
Route::get('/payments', 'HomeController@payment')->name('payments');
