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
    Route::get('/gramer/{site_url}/{article_url?}', 'BaseController@gramer_list');
    Route::get('/kelime/{site_url}/{article_url?}', 'BaseController@kelime_list');
    Route::get('/blog/{article_url?}', 'BaseController@blog');
    Route::get('/hikaye/{article_url?}', 'BaseController@hikaye');

    Route::get('/404-sayfa-bulunamadi', 'BaseController@page_not_found')->name('404-not-found');
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

Route::post('/process/subscribers', 'ProcessController@post_email');

Route::get('/asdasd', function (){
   return view('front_office.404');
});
