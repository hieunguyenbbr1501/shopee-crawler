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
    return view('welcome');
})->middleware('auth');
Route::get('/search/{keyword}', '\App\Http\Controllers\KeywordController@show')->name('keyword.search');
Route::get('/search', '\App\Http\Controllers\KeywordController@searchByRelevant')->name('keyword.search.list');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

