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


Route::get('/', function () {
    return view('welcome');
});*/
Route::resource('bettereats','PagesController');
Route::resource('admin','AdminController');
Route::resource('feed','FeedController');
Route::resource('feedlist','FeedlistController');
Route::get('menu','PagesController@others');
Route::get('about','PagesController@about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
