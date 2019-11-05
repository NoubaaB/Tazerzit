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
// navbar Menu
Route::get('/','TazerzitController@home');
Route::get("/home","TazerzitController@home")->name("home");
Route::get("/menu","TazerzitController@menu")->name("menu");
Route::get("/services","TazerzitController@services")->name("services");
Route::get("/hostel","TazerzitController@hostel")->name("hostel");
Route::get("/about","TazerzitController@about")->name("about");
Route::get("/contact","TazerzitController@contact")->name("contact");
// end navbar Menu

// Route::get('/home', 'HomeController@index')->name('home');

// Authentication Routes...
Route::get('login@129@', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login@129@', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// end Authentication Routes...

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
// end Password Reset Routes...

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify'); 
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
//end Email Verification Routes...

//email Route
Route::post('/send','TazerzitController@send')->name('send');
//endEmail

//header Route
Route::get('/Headears','TazerzitController@getHeadears')->name('getHeadears');
Route::post('/Headear/update','TazerzitController@updateHeader')->name('updateHeader')->middleware('auth');
Route::post('/Headear','TazerzitController@addHeader')->name('addHeader')->middleware('auth');
Route::post('/Headear/destroy','TazerzitController@deleteHeader')->name('deleteHeader')->middleware('auth');
//endHeader

//social
Route::get("social","TazerzitController@social")->name('social');
Route::post("social","TazerzitController@socialUpdate")->name('socialUpdate')->middleware('auth');
//end social

//menu
Route::resource("menus",'menueController');
Route::post('menusAlt','menueController@updatealt')->name('menus.updatealt')->middleware('auth');
Route::get('getmenu/{type}','menueController@getMenu')->name("getMenu");
Route::get('getallmenu/{many}', 'menueController@getAllMenu')->name("getAllMenu");
//end menu

//table
Route::get('table','TableController@index')->name("table.index");
Route::get('tables','TableController@dataTables')->name("tables");
Route::delete('tables/{id}','TableController@destroy')->name("table.destroy");
Route::post('tables/reserve','TableController@reserve')->name("table.reserve.add");
//end table

//hostel
Route::resource('hostels','HostelController');
Route::post('hostelsAlt','HostelController@updatealt')->name('hostels.updatealt')->middleware('auth');
//end Hostel

//book
Route::resource('book','BookController');
//end book

//email
Route::post("/sendEmail",'TazerzitController@email')->name('sendEmail');
//endEmail

//info
Route::get('/info','TazerzitController@getInfos')->name('info.index');
Route::patch('/info/{info}','TazerzitController@setInfos')->name('info.update')->middleware('auth');
//end info

//TazerzithostelRestau