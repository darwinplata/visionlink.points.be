<?php

// Author: Darwin Plata
// Date: Fri Jul 22, 2022

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

Route::middleware(['cors'])->group(function () {
    Route::get('/points/', 'App\Http\Controllers\PointController@index');
    Route::get('/points/{point}', 'App\Http\Controllers\PointController@show');
    Route::post('/points/', 'App\Http\Controllers\PointController@store');
    Route::post('/points/{point}', 'App\Http\Controllers\PointController@update');
    Route::delete('/points/{point}', 'App\Http\Controllers\PointController@delete');
});
