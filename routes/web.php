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


Route::get('/', 'WelcomeController@index')->name('welcome');



Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/packages', 'HomeController@packages')->name('packages');
    Route::get('/checkout/{id}', 'HomeController@checkout')->name('checkout');
    Route::post('/buy_package', 'PackageController@sendRequest')->name('buy_package');
    Route::get('/payments', 'HomeController@payment')->name('payments');
    Route::get('/invoices', 'InvoiceController@index')->name('invoices');
    Route::get('/subscriptions', 'SubscriptionController@getSubscription')->name('subscriptions');
});

//Admin Routes

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('subscribers', SubscribersController::class);
    Route::resource('sites', SitesController::class);
    Route::resource('package', PlanController::class);
    Route::resource('payment', SubscriptionController::class);
    Route::resource('bandwidth', BandwidthController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('router', RouterController::class);
    Route::resource('router_user', RouterUserController::class);
    Route::resource('request_con', RequestConController::class);
});

Route::get('account/verify/{token}', 'VerifyController@verifyAccount');

