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

Route::get('/home', [IndexController::class, 'home'])->name('home');
Route::get('/home/category/{slug}',[IndexController::class, 'category'])->name('category');
Route::get('/home/movie/{slug}',[IndexController::class, 'movie'])->name('movie');
Route::get('/home/genre/{slug}',[IndexController::class, 'genre'])->name('genre');
Route::get('/home/watch/{slug}/{ep}',[IndexController::class, 'watch'])->name('watch');





Route::get('/search',[IndexController::class, 'timkiem'])->name('tim-kiem');
Route::get('/filter',[IndexController::class, 'filter'])->name('filter_movie');







// Route::get('/test_movie',[IndexController::class, 'movie'])->name('movie');
// Route::get('/test_login',[IndexController::class, 'login'])->name('login');
// Route::get('/test_signup',[IndexController::class, 'signup'])->name('signup');


Auth::routes();

Route::get('/admin', [HomeController::class, 'index'])->name('admin'); //'home'





//route admin
Route::resource('category', CategoryController::class);
Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('movie', MovieController::class);
Route::resource('episode', EpisodeController::class);
Route::get('select-movie',[EpisodeController::class, 'select_movie'])->name('select-movie');


Route::post('resorting',[CategoryController::class,'resorting'])->name('resorting');


Route::get('/test_api/{id}',[ApiTmdbController::class, 'getInfoMovie']);