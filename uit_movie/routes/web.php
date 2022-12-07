<?php

use Illuminate\Support\Facades\Route;

//admin controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ApiTmdbController;

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

Route::get('/', [IndexController::class, 'home']);
Route::get('/danhmuc/{slug}',[IndexController::class, 'category'])->name('category');

Route::get('/test_movie',[IndexController::class, 'movie'])->name('movie');
Route::get('/test_login',[IndexController::class, 'login'])->name('login');
Route::get('/test_signup',[IndexController::class, 'signup'])->name('signup');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');




//route admin
Route::resource('category', CategoryController::class);
Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('movie', MovieController::class);
Route::resource('episode', EpisodeController::class);

Route::post('resorting',[CategoryController::class,'resorting'])->name('resorting');


Route::get('/test_api/{id}',[ApiTmdbController::class, 'getInfoMovie']);