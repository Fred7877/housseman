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
    Route::get('users', 'UserController@index')->name('user.index');
    Route::get('create/user', 'UserController@create')->name('create.user');
    Route::post('store/user', 'UserController@store')->name('store.user');
    Route::get('list-users', 'UserController@list')->name('list.users');

    Route::get('prestations', 'PrestationController@index')->name('prestation.index');
    Route::get('prestation/create', 'PrestationController@create')->name('prestation.create');
    Route::post('prestation/store', 'PrestationController@store')->name('prestation.store');
    Route::get('prestations/{prestation}/edit', 'PrestationController@edit')->name('prestation.edit');
    Route::post('prestation/{prestation}', 'PrestationController@update')->name('prestation.update');
    Route::get('list-prestations', 'PrestationController@list')->name('prestations.list');
    Route::post('prestation/{prestation}/delete', 'PrestationController@delete')->name('prestation.delete');

    Route::get('invoices', 'InvoiceController@index')->name('invoice.index');
    Route::get('quotes', 'QuoteController@index')->name('quote.index');

    Route::get('customers', 'CustomerController@index')->name('customers.index');
    Route::get('list-customers', 'CustomerController@list')->name('customers.list');
    Route::get('customers/create', 'CustomerController@create')->name('customer.create');
    Route::post('customers/store', 'CustomerController@store')->name('customer.store');
    Route::get('customers/{customer}/edit', 'CustomerController@edit')->name('customer.edit');
    Route::post('customers/{customer}', 'CustomerController@update')->name('customer.update');
    Route::post('customer/{customer}/delete', 'CustomerController@delete')->name('customer.delete');

    Route::get('events', 'EventController@index')->name('event.index');
    Route::get('list-customers', 'EventController@list')->name('events.list');
    Route::get('events/create', 'EventController@create')->name('event.create');
    Route::post('events/store', 'EventController@store')->name('event.store');
    Route::get('events/{event}/edit', 'EventController@edit')->name('event.edit');
    Route::post('events/{event}', 'EventController@update')->name('event.update');
    Route::post('events/{event}/delete', 'EventController@delete')->name('event.delete');

});
