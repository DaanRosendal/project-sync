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
})->middleware('is_admin');

Auth::routes();

// Routes voor admins
Route::middleware(['auth', 'is_admin'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

});
