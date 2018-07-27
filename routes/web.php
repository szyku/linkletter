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

Route::get('/load', 'LoadExtra')->name('load');
Route::get('/issue/{id}', 'SingleBatch')->name('single');
Route::get('/', 'Homepage')->name('home');
