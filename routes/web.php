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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','FrontendController@index')->name('main');

Route::get('main','PageController@main')->name('mainpage');
Route::get('/sign_up','FrontendController@register')->name('signup');
Route::get('/signin','FrontendController@signin')->name('signin');
Route::get('/vregister','FrontendController@vendor_register')->name('vregister');
Route::post('/vendor','FrontendController@vendor')->name('vendor');

Route::post('/customer','FrontendController@customer')->name('customer');

Route::resource('category','CategoryController');
Route::resource('brand','BrandController');
Route::resource('subcategory','SubcategoryController');

Auth::routes();
 Route::get('/home', 'HomeController@index')->name('home');
