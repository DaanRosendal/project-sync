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

    // CRUD routes voor Projecten
    Route::get('/admin/projecten', 'ProjectenController@index')->name('admin.projecten.index');
    Route::get('/admin/projecten/create', 'ProjectenController@create')->name('admin.projecten.create');
    Route::post('/admin/projecten', 'ProjectenController@store');
    Route::get('/admin/projecten/{project}/edit', 'ProjectenController@edit')->name('admin.projecten.edit');
    Route::put('/admin/projecten/{project}', 'ProjectenController@update');
    Route::get('/admin/projecten/{project}/delete', 'ProjectenController@destroy')->name('admin.projecten.delete');

    // CRUD routes voor Kosten
    Route::get('/admin/kosten', 'KostenController@index')->name('admin.kosten.index');
    Route::get('admin/kosten/create', 'KostenController@create')->name('admin.kosten.create');
    Route::post('admin/kosten', 'KostenController@store');
    Route::get('/admin/kosten/{kost}/edit', 'KostenController@edit')->name('admin.kosten.edit');
    Route::put('admin/kosten/{kost}', 'KostenController@update');
    Route::get('admin/kosten/{kost}/delete', 'KostenController@destroy')->name('admin.kosten.delete');

    // CRUD routes voor Consultants
    Route::get('/admin/consultants', 'ConsultantsController@index')->name('admin.consultants.index');
    Route::get('admin/consultants/create', 'ConsultantsController@create')->name('admin.consultants.create');
    Route::post('admin/consultants', 'ConsultantsController@store');
    Route::get('/admin/consultants/{consultant}/edit', 'ConsultantsController@edit')->name('admin.consultants.edit');
    Route::put('admin/consultants/{consultant}', 'ConsultantsController@update');
    Route::get('admin/consultants/{consultant}/delete', 'ConsultantsController@destroy')->name('admin.consultants.delete');

    // Routes voor rapporten
    Route::get('/admin/rapporten/consultants', 'RapportenController@showConsultants')->name('admin.rapporten.consultants');
    Route::post('/admin/rapporten/consultants', 'RapportenController@showRapportConsultants');
    Route::get('/admin/rapporten/projecten', 'RapportenController@showProjecten')->name('admin.rapporten.projecten');
    Route::post('/admin/rapporten/projecten', 'RapportenController@showRapportProjecten');
});
