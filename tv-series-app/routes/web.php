<?php

use App\Http\Controllers\EpisodeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\AuthController;
use Laravel\Fortify\Features;
use App\Http\Controllers\DashboardController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
//
//public function boot(): void
//{
//    Fortify::loginView(function () {
//        return view('auth.login');
//    });
//}



Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});

Route::middleware(['auth'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('auth.store');
Route::post('/logout', [AuthController::class, 'destroy'])->name('auth.logout');

//Séries
Route::get('/series', [SeriesController::class, 'index'])->name('series.index');
Route::get('/series/create', [SeriesController::class, 'create'])->name('series.create');
Route::post('/series', [SeriesController::class, 'store'])->name('series.store');
Route::delete('/series/{id}', [SeriesController::class, 'destroy'])->name('series.destroy');
Route::get('/series/{id}/edit', [SeriesController::class, 'edit'])->name('series.edit');
Route::put('/series/{id}', [SeriesController::class, 'update'])->name('series.update');
Route::get('/series/{id}', [SeriesController::class, 'show'])->name('series.show');

//Temporadas
Route::get('/series/{seriesId}/seasons', [SeasonController::class, 'index'])->name('seasons.index');
//Route::get('/series/{seriesId}/seasons/{seasonId}', [SeasonController::class, 'show'])->name('seasons.show');
Route::get('/series/{seriesId}/seasons/{seasonId}/edit', [SeasonController::class, 'edit'])->name('seasons.edit');
Route::put('/series/{seriesId}/seasons/{seasonId}', [SeasonController::class, 'update'])->name('seasons.update');
Route::get('/series/{seriesId}/seasons/create', [SeasonController::class, 'create'])->name('seasons.create');
Route::post('/series/{seriesId}/seasons', [SeasonController::class, 'store'])->name('seasons.store');
Route::delete('/series/{seriesId}/seasons/{seasonId}', [SeasonController::class, 'destroy'])->name('seasons.destroy');

//Episódios
Route::get('/series/{seriesId}/seasons/{seasonId}/episodes', [EpisodeController::class, 'index'])->name('episodes.index');
//Route::get('/series/{seriesId}/seasons/{seasonId}/episodes/{episodeId}', [EpisodeController::class, 'show'])->name('episodes.show');
Route::get('/series/{seriesId}/seasons/{seasonId}/episodes/{episodeId}/edit', [EpisodeController::class, 'edit'])->name('episodes.edit');
Route::put('/series/{seriesId}/seasons/{seasonId}/episodes/{episodeId}', [EpisodeController::class, 'update'])->name('episodes.update');
Route::get('/series/{seriesId}/seasons/{seasonId}/episodes/create', [EpisodeController::class, 'create'])->name('episodes.create');
Route::post('/series/{seriesId}/seasons/{seasonId}/episodes', [EpisodeController::class, 'store'])->name('episodes.store');
Route::delete('/series/{seriesId}/seasons/{seasonId}/episodes/{episodeId}', [EpisodeController::class, 'destroy'])->name('episodes.destroy');
