<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Admin Controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\LeechMovieController;
use App\Http\Controllers\LoginFBController;
use App\Http\Controllers\LoginGoogleController;

Route::get('/',[IndexController::class, 'home'])->name('homepage');
Route::get('/danh-muc/{slug}',[IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}',[IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}',[IndexController::class, 'country'])->name('country');
Route::get('/phim/{slug}',[IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}',[IndexController::class, 'watch']);
Route::get('/so-tap', [IndexController::class, 'episode'])->name('so-tap');
Route::get('/nam/{year}',[IndexController::class, 'year']);
Route::get('/search',[IndexController::class, 'search'])->name('search');
Route::get('/loc-phim',[IndexController::class, 'locphim'])->name('locphim');
Route::post('/add-rating',[IndexController::class, 'addRating'])->name('add-rating');
Route::get('/filter-topview-phim',[IndexController::class, 'filterTopview']);
Route::get('/filter-topview-default',[IndexController::class, 'filterTopviewDefault']);


Auth::routes();
Route::get('/home',[HomeController::class, 'index'])->name('home');


// // login google
Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('login-by-google');

Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);
Route::get('logout-home', [LoginGoogleController::class, 'logoutHome'])->name('logout-home');

// Route Admin 
// Route::resources([
//     'category' => CategoryController::class,
//     'genre' => GenreController::class,
//     'country' => CountryController::class,
//     'episode' => EpisodeController::class,
//     'movie' => MovieController::class,
// ]);
Route::get('/add-episode/{id}',[EpisodeController::class, 'addEpisode'])->name('add-episode');

Route::get('/update-year-phim',[MovieController::class, 'updateYear']);
Route::get('/update-topview-phim',[MovieController::class, 'updateTopView']);
Route::get('/update-season-phim',[MovieController::class, 'updateSeason']);

Route::middleware(['admin'])->group(function () {
    Route::resources([
        'category' => CategoryController::class,
        'genre' => GenreController::class,
        'country' => CountryController::class,
        'episode' => EpisodeController::class,
        'movie' => MovieController::class,
        'info' => InfoController::class,

    ]);
    Route::get('/add-episode/{id}', [EpisodeController::class, 'addEpisode'])->name('add-episode');
    Route::get('/update-year-phim', [MovieController::class, 'updateYear']);
    Route::get('/update-topview-phim', [MovieController::class, 'updateTopView']);
    Route::get('/update-season-phim', [MovieController::class, 'updateSeason']);
    Route::get('logout', [HomeController::class, 'logout'])->name('logout');
    Route::get('leech-movie', [LeechMovieController::class, 'leech_movie'])->name('leech-movie');
    Route::post('leech-store/{slug}', [LeechMovieController::class, 'leech_store'])->name('leech-store');
    Route::get('leech-episode/{slug}', [LeechMovieController::class, 'leech_episode'])->name('leech-episode');
    Route::post('leech-episode-store/{slug}', [LeechMovieController::class, 'leech_episode_store'])->name('leech-episode-store');

    





});
