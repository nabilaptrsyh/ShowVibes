<?php

use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'MoviesController@index')->name('movies.index');
Route::get('/movies/{movie}', 'MoviesController@show')->name('movies.show');
Route::get('/',  [MoviesController::class , 'index']);
Route::get('/movies/{movie}', [MoviesController::class, 'show']);
Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.show');
Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index');

Route::view('/home', 'home');
// Route::view('/welcome', 'welcome');

// SENGAJA DI COMMENT DULU!
// Route::view('/', 'index');
// Route::view('/', 'show');

