<?php

use App\Http\Controllers\ApiKeyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\PlaylistController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [TrackController::class, 'index'])->name('tracks.index');
Route::get('/test', [HomeController::class, 'test'])->name('test'); // name doesn't have to be the same as the route one

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::resource('playlists', PlaylistController::class);

    Route::name('tracks.')->prefix('tracks')->controller(TrackController::class)->middleware([IsAdmin::class])->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{track}', 'show')->name('show');
        Route::get('/{track}/edit', 'edit')->name('edit');
        Route::put('/{track}', 'update')->name('update');
        Route::delete('/{track}', 'destroy')->name('destroy');
    });

    Route::controller(ApiKeyController::class)->prefix('api-keys')->name('api-keys.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::delete('/{api_key}', 'destroy')->name('destroy');
    });
});

// Route::resource('tracks', TrackController::class) // same as the previous one but with all the methods
// Route::resource('tracks', TrackController::class)->except(['show']); // same as the previous one but without show
// Route::resource('tracks', TrackController::class)->only(['show']); // same as the previous one but only with show