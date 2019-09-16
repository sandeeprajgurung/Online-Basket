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


// backend CMS
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/ob-admin', 'PageController@obadmin')->name('ob_admin');
Route::get('/ob-admin/form/vegetable', 'VegetableController@index')->name('form.vegetable');
Route::post('/ob-admin/vegetable', 'VegetableController@store')->name('imageStore');
Route::get('/ob-admin/vegetable', 'VegetableController@show');
Route::post('/ob-admin/vegetable/{id}', 'VegetableController@update');
// Route::get('/home', 'HomeController@index')->name('home');