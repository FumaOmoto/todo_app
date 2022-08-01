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

Route::get('/', 'App\Http\Controllers\StaticPageController@index');

Route::namespace('App\Http\Controllers')->prefix('tasks')->group(function () {
    Route::get('', 'TaskController@index')->name('tasks.index');
    Route::get('edit', 'TaskController@edit')->name('tasks.edit');
    Route::post('create', 'TaskController@create')->name('tasks.create');
    Route::post('update/{id}', 'TaskController@update')->name('tasks.update');
    Route::post('delete/{id}', 'TaskController@destroy')->name('tasks.destroy');
    Route::post('{id}/time_logs/create', 'TimeLogController@create')->name('time_logs.create');
});
