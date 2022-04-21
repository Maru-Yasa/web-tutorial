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

Route::get('/','App\Http\Controllers\IndexController@index');

Auth::routes();
Route::get('/register', function() {
    return redirect('/login');
});

Route::post('/register', function() {
    return redirect('/login');
});
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin','middleware' => 'auth'], function(){

    Route::group(['prefix' => 'post'], function(){
        Route::get('/add', 'App\Http\Controllers\PostController@index');
        Route::post('/add', 'App\Http\Controllers\PostController@add');
        Route::get('/{id}/edit', 'App\Http\Controllers\PostController@editView');
        Route::post('/{id}/edit', 'App\Http\Controllers\PostController@edit');
        Route::get('/{id}/delete', 'App\Http\Controllers\PostController@delete');
    });

    Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
        Route::get('/{id}/edit', 'App\Http\Controllers\UserController@editView');
        Route::post('/{id}/edit', 'App\Http\Controllers\UserController@edit');
        Route::get('/create', 'App\Http\Controllers\UserController@createView');
        Route::post('/create', 'App\Http\Controllers\UserController@create');
        Route::get('/{id}/delete', 'App\Http\Controllers\UserController@delete');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'App\Http\Controllers\UserController@view');
    });

});

Route::get('/post/detail/{id}', 'App\Http\Controllers\PostController@detailView');