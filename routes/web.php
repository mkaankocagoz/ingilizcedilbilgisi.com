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

Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::namespace('FrontController')->group(function () {
    Route::get('/', 'BaseController@index');
});

Route::group(['middleware' => ['isAdmin']], function () {
    Route::namespace('BackController')->group(function () {
        Route::get('/admin', 'BaseController@index');
        Route::get('/admin/pages/list/{id}', 'BaseController@list');
        Route::post('/admin/pages/list/changeStatus', 'BaseController@change_status');
        Route::get('/admin/pages/create/{id}', 'BaseController@create');
        Route::post('/admin/pages/create', 'BaseController@store');
        Route::post('/admin/pages/create/addImage', 'BaseController@add_images');
        Route::get('/admin/pages/edit/{id}', 'BaseController@edit');
        Route::post('/admin/pages/update', 'BaseController@update');
        Route::get('/admin/pages/delete/{id}', 'BaseController@delete');
    });
});
