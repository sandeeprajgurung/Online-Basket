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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PageController@index')->name('home');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::get('/blog', 'PageController@blog')->name('blog');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/cart', 'PageController@cart')->name('cart');