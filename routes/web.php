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

Route::get('/admin', function () {
    return view('welcome');
});

Auth::routes();  // NON è UN ERRORE

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->namespace('Admin')
    ->group(function () {

        Route::get('/home', 'HomeController@index')->name('home');

        Route::resource('posts', 'PostController');
    });

Route::get('{any?}', function(){
    // dd($any);
    return view('guest.home');
})->where('any','.*');


// Route::get('/', function () {
//     return view('welcome');
// });
