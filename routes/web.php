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
    return redirect('/dashboard');
});

Auth::routes(['register' => false]);
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/notifications', 'NotificationsController@index')->name('notification.index');
Route::post('/notifications', 'NotificationsController@create')->name('notification.create');
