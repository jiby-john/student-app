<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentMarkController;

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
Route::get('/', 'App\Http\Controllers\StudentController@show')->name('studentList');
Route::get('/student/show', 'App\Http\Controllers\StudentController@index')->name('studentShow');
Route::get('/student/create', 'App\Http\Controllers\StudentController@create')->name('studentCreate');
Route::post('/student/create', 'App\Http\Controllers\StudentController@store')->name('studentSave');
Route::get('/student/edit/{id}', 'App\Http\Controllers\StudentController@edit')->name('studentEdit');
Route::put('/student/edit/{id}', 'App\Http\Controllers\StudentController@update')->name('studentUpdate');
Route::delete('/student/delete/{id}', 'App\Http\Controllers\StudentController@destroy')->name('studentDelete');

Route::get('/studentMark/list', 'App\Http\Controllers\StudentMarkController@show')->name('studentMarkList');
Route::get('/studentMark/show', 'App\Http\Controllers\StudentMarkController@index')->name('studentMarkShow');
Route::get('/studentMark/create', 'App\Http\Controllers\StudentMarkController@create')->name('studentMarkCreate');
Route::post('/studentMark/create', 'App\Http\Controllers\StudentMarkController@store')->name('studentMarkSave');
Route::get('/studentMark/edit/{id}', 'App\Http\Controllers\StudentMarkController@edit')->name('studentMarkEdit');
Route::put('/studentMark/edit/{id}', 'App\Http\Controllers\StudentMarkController@update')->name('studentMarkUpdate');
Route::delete('/studentMark/delete/{id}', 'App\Http\Controllers\StudentMarkController@destroy')->name('studentMarkDelete');
