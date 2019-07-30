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

/* Declaro las rutas que serán visibles sólo para los usuarios logueados */

Route::middleware('auth')->group(function() {

Route::get('/profile', function () {
    return view('front.profile');
})->name('profile');

Route::get('/connections', function () {
    return view('front.connections');
})->name('connections');

Route::get('/events/create', 'EventController@create');
Route::delete('/events/{id}', 'EventController@destroy');
Route::get('/events/{id}/edit', 'EventController@edit');

Route::get('/Posts/create', 'PostController@create');
Route::delete('/Posts/{id}', 'PostController@destroy');
Route::get('/Posts/{id}/edit', 'PostController@edit');

});

/* Rutas públicas*/

Route::resource('/events', 'EventController')->except(['create', 'destroy', 'edit']);

Route::resource('/posts', 'EventController')->except(['create', 'destroy', 'edit']);

Route::get('/', function () {
    return view('front.index');
})->name('index');

Route::get('/faq', function () {
    return view('front.faq');
})->name('faq');

Route::get('/underconstruction', function () {
    return view('front.underconstruction');
})->name('underconstruction');

/* Rutas de Registro y Login */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
