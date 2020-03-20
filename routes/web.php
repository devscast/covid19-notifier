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
    return response(json_encode('hello world'));
});

Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/notifications', 'NotificationsController@index')->name('notification.index');
Route::post('/notifications', 'NotificationsController@new')->name('notification.new');
