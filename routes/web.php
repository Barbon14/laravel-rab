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

// admin login/logout
Route::name('admin.')
        ->prefix('admin')
        ->group(function () {
            Route::post('/login', 'Auth\LoginController@login')->name('login');
            Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

            // to admin panel
            Route::get('/panel', 'AdminController@dashboard')->name('panel');
        });

// guest
Route::get('/', 'GuestController@home')->name('home');

// articles crud
Route::name('article.')
        ->prefix('article')
        ->group(function () {
            Route::get('/show/{id}', 'ArticleController@show')->name('show');

            Route::middleware('auth')
                    ->group(function () {
                        Route::get('/list', 'ArticleController@getList')->name('list');
                        Route::get('/create', 'ArticleController@create')->name('create');
                        Route::post('/store', 'ArticleController@store')->name('store');
                        Route::get('/edit/{id}', 'ArticleController@edit')->name('edit');
                        Route::post('/update/{id}', 'ArticleController@update')->name('update');
                        Route::get('/delete/{id}', 'ArticleController@delete')->name('delete');
                    });
        });

// places crud
Route::name('place.')
        ->prefix('place')
        ->group(function () {
            Route::get('/show/{id}', 'PlaceController@show')->name('show');

            Route::middleware('auth')
                    ->group(function () {
                        Route::get('/list', 'PlaceController@getList')->name('list');
                        Route::get('/create', 'PlaceController@create')->name('create');
                        Route::post('/store', 'PlaceController@store')->name('store');
                        Route::get('/edit/{id}', 'PlaceController@edit')->name('edit');
                        Route::post('/update/{id}', 'PlaceController@update')->name('update');
                        Route::get('/delete/{id}', 'PlaceController@delete')->name('delete');
                    });
        });
