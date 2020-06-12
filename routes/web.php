<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::resource('users', 'UserController');
    Route::get('list-users', 'UserController@list')->name('list.users');

    Route::resource('prestations', 'PrestationController');
    Route::get('list-prestations', 'PrestationController@list')->name('prestations.list');

    Route::get('invoices', 'InvoiceController@index')->name('invoice.index');
    //Route::get('quotes', 'QuoteController@index')->name('quote.index');

    Route::resource('customers', 'CustomerController');
    Route::get('list-customers', 'CustomerController@list')->name('customers.list');

    Route::resource('events', 'EventController');
    Route::get('list-events', 'EventController@list')->name('events.list');

    Route::resource('quotes', 'QuoteController');
    Route::get('list-quotes', 'QuoteController@list')->name('quotes.list');

});
