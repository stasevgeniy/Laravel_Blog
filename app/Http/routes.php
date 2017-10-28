<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 * HomeController@function -> Admin Controller for add, edit and deleting publications
 *
 * IndexController@function -> Main Controller for display publications, blog information and contact with administration
 *
 * */

Route::get('/','IndexController@index')->name('index');

Route::get('/info','IndexController@info')->name('info');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/show', function () {
    return redirect('/');
});

Route::get('/admin', function () {
    return redirect('home');
})->name('home');

Route::get('/show/{id}','IndexController@show')->name('show');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/home/add', 'HomeController@add');
Route::get('/home/edit', 'HomeController@edit');

Route::post('/home/add', 'HomeController@AddPost')->name('AddPost');

Route::get('/home/edit/{id}','HomeController@EditPost')->name('EditPost');
Route::post('/home/edit/{id}','HomeController@SavePost')->name('SavePost');
Route::get('/home/delete/{id}','HomeController@DeletePost')->name('DeletePost');

Route::post('/contact', 'IndexController@SendMail')->name('SendMail');