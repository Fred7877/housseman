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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/admin/users', function () {
    return view('admin.users');
});

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('users', 'UserController@index')->name('user.index');
    Route::get('create/user', 'UserController@create')->name('create.user');
    Route::post('store/user', 'UserController@store')->name('store.user');
    Route::get('list-users', 'UserController@list')->name('list.users');
    Route::get('prestations', 'PrestationController@index')->name('prestation.index');
    Route::get('list-transactions', 'TransactionController@list')->name('transaction.list');


});
