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

Auth::routes();

// Routes voor willekeurige bezoekers
Route::get('/', function () {return view('welcome');});

// Routes voor consultants
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/declareren', function () {return view('user.declareren');})->name('declareren');
Route::get('/rapporten', function () {return view('user.rapporten');})->name('rapporten');

// Routes voor admins
Route::middleware(['auth', 'is_admin'])->group(function () {

});
