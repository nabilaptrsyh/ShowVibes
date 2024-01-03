<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminMoviesController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

// AUTH GOOGLE
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

// // LOGIN
// Route::get('/login',  [LoginController::class,'index'])->name('login')-> middleware('guest');
// Route::post('/login',  [LoginController::class,'authenticate']);
// Route::post('/logout',  [LoginController::class,'logout']);

// UNTUK HALAMAN MOVIE
// Route::get('/', 'MoviesController@index')->name('movies.index');

Route::get('/movies/{movie}', 'MoviesController@show')->name('movies.show');

// Route::get('/',  [MoviesController::class , 'index']);
Route::get('/movies/{movie}', [MoviesController::class, 'show']);
Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.show');
Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index')->middleware('auth');

Route::get('/dashboard/movies/{movie}', [MoviesController::class, 'dashboardShow']);
Route::get('/dashboard/movies', [MoviesController::class, 'dashboardIndex'])->name('movies.dashboardIndex');
Route::get('/dashboard', [MoviesController::class, 'dashboardIndex'])->name('movies.dashboardIndex');

Route::get('/admin/movies', [AdminMoviesController::class, 'index'])->name('movies.dashboardIndex');
Route::get('/admin/movies/{movie}', [AdminMoviesController::class, 'dashboardShow']);
Route::get('/admin', [AdminController::class, 'index'])->name('movies.dashboardIndex');

// Route::middleware(['auth','admin'])->group(function() {
//     Route::get('/admin/movies', [AdminMoviesController::class, 'index'])->name('movies.dashboardIndex');
// })->middleware(['auth','admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware(['admin']);
    Route::get('/profile-user', [ProfileController::class, 'editUser'])->name('profileUser.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile-user', [ProfileController::class, 'updateUser'])->name('profileUser.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile-user', [ProfileController::class, 'destroyUser'])->name('profileUser.destroy');
});

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/kategori', [AdminMoviesController::class, 'index'])->name('movies.index');
//     Route::get('/admin/kategori/{movie}', [AdminMoviesController::class, 'show'])->name('movies.show');
//     // Route::get('/admin/movies/create', [AdminMoviesController::class, 'create'])->name('movies.create');
//     // Route::post('/admin/movies', [AdminMoviesController::class, 'store'])->name('movies.store');
//     // Route::get('/admin/movies/{movie}/edit', [AdminMoviesController::class, 'edit'])->name('movies.edit');
//     // Route::patch('/admin/movies/{movie}', [AdminMoviesController::class, 'update'])->name('movies.update');
//     // Route::delete('/admin/movies/{movie}', [AdminMoviesController::class, 'destroy'])->name('movies.destroy');
// });

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/layouts', [AdminMoviesController::class, 'index'])->name('movies.index');
    Route::get('/admin/layouts', [AdminMoviesController::class, 'show'])->name('movies.show');
    Route::get('/admin/layouts/create', [AdminMoviesController::class, 'create'])->name('movies.create');
    Route::post('/admin', [AdminMoviesController::class, 'store'])->name('movies.store');
    Route::get('/admin/layouts/edit', [AdminMoviesController::class, 'edit'])->name('movies.edit');
    Route::patch('/admin', [AdminMoviesController::class, 'update'])->name('movies.update');
    Route::delete('/admin', [AdminMoviesController::class, 'destroy'])->name('movies.destroy');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

require __DIR__.'/auth.php';