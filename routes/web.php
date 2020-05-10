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
    Route::get('prestation/create', 'PrestationController@create')->name('prestation.create');
    Route::post('prestation/store', 'PrestationController@store')->name('prestation.store');
    Route::get('prestations/{prestation}/edit', 'PrestationController@edit')->name('prestation.edit');
    Route::post('prestation/{prestation}', 'PrestationController@update')->name('prestation.update');
    Route::get('list-prestations', 'PrestationController@list')->name('prestations.list');

});
