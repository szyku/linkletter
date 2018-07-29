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

Route::get('/load-groups', 'LoadDispatchGroups')->name('loadGroups');
Route::get('/load-links/{tag}', 'LoadLinksByTag')->name('loadTagLinks');
Route::get('/issue/{job}', 'SingleBatch')->name('single');
Route::get('/group/{group}', 'SingleGroup')->name('group');
Route::get('/tags/{tag}', 'SingleTag')->name('tag');
Route::get('/', 'Homepage')->name('home');
Route::get('/unsubscribe/{email}', 'Unsubscribe')->name('unsubscribe');

Route::post('/subscribe', 'Subscribe')->name('subscribe');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
