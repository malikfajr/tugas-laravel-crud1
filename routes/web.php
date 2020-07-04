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
    return redirect('pertanyaan');
});

Route::get('/pertanyaan', 'PertanyaanController@index')->name('pertanyaan');
Route::get('/pertanyaan/create', 'PertanyaanController@create');
Route::get('/pertanyaan/{id}', 'PertanyaanController@show');
Route::get('/pertanyaan/{id}/edit', 'PertanyaanController@edit');

Route::post('/pertanyaan', 'PertanyaanController@store');
Route::put('/pertanyaan/solved', 'PertanyaanController@solved');
Route::put('/pertanyaan/{id}', 'PertanyaanController@update');
Route::delete('/pertanyaan/{id}', 'PertanyaanController@delete');

Route::get('/jawaban/{pertanyaan_id}', 'JawabanController@index')->name('jawaban');
Route::post('/jawaban/{pertanyaan_id}', 'JawabanController@store');
