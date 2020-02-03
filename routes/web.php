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

// Routes voor nieuwe bezoekers
Route::get('/', function () {return view('welcome');})->middleware('is_logged_in');

Route::get('/home', 'HomeController@index')->name('home');

// Routes voor consultants
Route::middleware(['auth'])->group(function () {
    Route::get('/declareren', 'DeclaratiesController@create')->name('declareren');
    Route::post('/declareren', 'DeclaratiesController@store');

    Route::get('/rapporten', 'RapportenController@showConsultants')->name('rapporten');
    Route::post('/rapporten', 'RapportenController@showRapportConsultants');
});


// Routes voor admins
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/home', 'HomeController@index')->name('admin.home');
    Route::get('/admin/projecten', 'HomeController@index')->name('admin.projecten');
    Route::get('/admin/kosten', 'HomeController@index')->name('admin.kosten');
    Route::get('/admin/consultants', 'HomeController@index')->name('admin.consultants');

    Route::get('/admin/rapporten/consultants', 'RapportenController@showConsultants')->name('admin.rapporten.consultants');
    Route::post('/admin/rapporten/consultants', 'RapportenController@showRapportConsultants');
    Route::get('/admin/rapporten/projecten', 'RapportenController@showProjecten')->name('admin.rapporten.projecten');
    Route::post('/admin/rapporten/projecten', 'RapportenController@showRapportProjecten');
});
