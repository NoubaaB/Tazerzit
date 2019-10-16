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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/home","TazerzitController@home")->name("home");
Route::get("/menu","TazerzitController@menu")->name("menu");
Route::get("/services","TazerzitController@services")->name("services");
Route::get("/blog","TazerzitController@blog")->name("blog");
Route::get("/about","TazerzitController@about")->name("about");
Route::get("/contact","TazerzitController@contact")->name("contact");
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
