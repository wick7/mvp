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
Route::get('about', 'Pages@getAbout');
Route::get('contact', 'Pages@getContact');

//post route 
Route::resource('posts', 'PostController');

//photos route
Route::get('photos/{id}','Photocontroller@create')->name('photos');
Route::post('photos/{id}', 'Photocontroller@store')->name('photos');
Route::get('photos/edit/{id}','Photocontroller@edit')->name('photos_edit');
Route::put('photos/{id}', 'Photocontroller@update')->name('photos');
Route::delete('photos/{id}', 'Photocontroller@destroy')->name('photos');

//Organization routes
Route::get('Organization/{id}','OrganizationController@show')->name('orgshow');
Route::get('Organization/create','OrganizationController@create')->name('org');
Route::post('Organization/Post', 'OrganizationController@store')->name('orgpost');
Route::get('Organization/edit/{id}','OrganizationController@edit')->name('organizations_edit');
Route::put('Organization/{id}', 'OrganizationController@update')->name('organizations');
Route::delete('Organization/{id}', 'OrganizationController@destroy')->name('organizations');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
