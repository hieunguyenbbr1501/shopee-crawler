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

Route::get('/', function () {
    return redirect('/home');
})->middleware('auth');
Route::get('/keyword/{keyword}', '\App\Http\Controllers\KeywordController@show')->name('keyword.detail')->middleware('auth');
Route::get('/search', '\App\Http\Controllers\KeywordController@searchByRelevant')->name('keyword.search.list')->middleware('auth');
Route::get('/category/{id}', '\App\Http\Controllers\CategoryController@detail')->name('category.detail')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/logout', 'HomeController@logout')->name('logout')->middleware('auth');

