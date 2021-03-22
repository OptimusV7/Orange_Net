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
Route::prefix('lnmo')->group(function ()
{
    Route::post('mpesa_pay', 'MpesaController@payment_complete')->name('mpesa.pay');
    Route::any('pay', 'MpesaController@mpesa_pay');
    Route::any('validate', 'MpesaController@validation');
    Route::any('confirm', 'MpesaController@confirmation');
    Route::any('results', 'MpesaController@results');
    Route::any('register', 'MpesaController@register');
    Route::any('timeout', 'MpesaController@timeout');
    Route::any('reconcile', 'MpesaController@reconcile');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/packages', 'HomeController@packages')->name('packages');
Route::post('/buy_package', 'PackageController@buy_packages')->name('buy_package');
