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

Route::get('/', 'Pages@getHome');
Route::get('terms', 'Pages@getTerms');
Route::get('privacy', 'Pages@getPrivacy');
Route::get('attribution', 'Pages@getAttribution');

//post route
Route::resource('posts', 'PostController');

//photos route
Route::get('photos/{id}','Photocontroller@create')->name('photos');
Route::post('photos/{id}', 'Photocontroller@store')->name('photos');
Route::get('photos/edit/{id}','Photocontroller@edit')->name('photos_edit');
Route::put('photos/{id}', 'Photocontroller@update')->name('photos');
Route::delete('photos/{id}', 'Photocontroller@destroy')->name('photos');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
