<?php

use Illuminate\Support\Facades\Route;
use App\Film;

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
    return view('home');
})->name('home');

/*Route::get('/', 'HomePageController@index')
    ->name('home');
*/
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/films', 'FilmController@index')
    ->name('films.index');

Route::get('/films/{id}', 'FilmController@show')
    ->name('films.show');

Route::get('/showtimes', 'ShowtimeController@index')
    ->name('showtimes.index');

Route::get('/orders', 'OrderController@create')
    ->name('orders.create');

Route::post('/orders', 'OrderController@store')
    ->name('orders.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
