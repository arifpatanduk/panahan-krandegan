<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/galeri', [GalleryController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);

// Socialite login
Route::get('login/{provider}', [SocialiteLoginController::class, 'redirectToProvider'])->name('login.provider');

// Socialite callback
Route::get('login/{provider}/callback', [SocialiteLoginController::class, 'handleCallback'])->name('callback.socialite');

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // route for all roles


    /**
     * --------------------------------------------------------------
     * ROUTE ADMIN
     * --------------------------------------------------------------
     */
    Route::middleware('role:Admin')
        ->name('admin')
        ->prefix('admin')
        ->group(function () {

            // route for admin only
            Route::get('/', [Admin\PagesController::class, 'index'])->name('index');
        });


    /**
     * --------------------------------------------------------------
     * ROUTE USER
     * --------------------------------------------------------------
     */
    Route::middleware('role:User')
        ->name('user')
        ->prefix('user')
        ->group(function () {

            // route for user only

        });
});
