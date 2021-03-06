<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\User;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
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

// Lbc basics
App\Lbc\LaravelBootstrapComponents::init();

// abc.com/lbc if you want to have the docs for it
App\Lbc\LaravelBootstrapComponents::initDocs();


Route::get('/', [HomepageController::class, 'index']);
Route::get('/galeri', [GalleryController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);

Route::get('/roadmap', [HomepageController::class, 'roadmap'])->name('roadmap');

// Socialite login
Route::get('login/{provider}', [SocialiteLoginController::class, 'redirectToProvider'])->name('login.provider');

// Socialite callback
Route::get('login/{provider}/callback', [SocialiteLoginController::class, 'handleCallback'])->name('callback.socialite');

Auth::routes(['verify' => true]);


// articles frontend
Route::name('articles.')->prefix('news')->group(function () {
    Route::get('/', [ArticlesController::class, 'index'])->name('index');
    Route::get('/{slug}', [ArticlesController::class, 'show'])->name('show');
});

// information
Route::name('information.')
->prefix('information')
->group(function() {
    Route::get('/', [User\InformationController::class, 'index'])->name('index');
    Route::get('/{information_id}', [User\InformationController::class, 'show'])->name('show');
});

// wahana
Route::name('wahana.')
->prefix('wahana')
->group(function() {
    Route::get('/', [User\WahanaController::class, 'index'])->name('index');
    Route::get('/{wahana_id}', [User\WahanaController::class, 'show'])->name('show');
});



Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout');


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // route for all roles


    /**
     * --------------------------------------------------------------
     * ROUTE ADMIN
     * --------------------------------------------------------------
     */
    Route::middleware('role:Admin')
        ->name('admin.')
        ->prefix('admin')
        ->group(function () {

            // route for admin only
            Route::get('/', [Admin\PagesController::class, 'index'])->name('index');

            Route::name('article.')
                ->prefix('article')
                ->group(function () {
                    Route::get('/', [Admin\PagesController::class, 'article'])->name('index');
                });

            Route::name('information.')
                ->prefix('information')
                ->group(function () {
                    Route::get('/', [Admin\PagesController::class, 'information'])->name('index');
                });

            Route::name('wahana.')
                ->prefix('wahana')
                ->group(function () {
                    Route::get('/', [Admin\PagesController::class, 'wahana'])->name('index');
                });

            Route::name('gallery.')
                ->prefix('gallery')
                ->group(function () {
                    Route::get('/', [Admin\PagesController::class, 'gallery'])->name('index');
                });

            Route::name('ads.')
                ->prefix('ads')
                ->group(function () {
                    Route::get('/', [Admin\PagesController::class, 'ads'])->name('index');
                });
        });


    /**
     * --------------------------------------------------------------
     * ROUTE USER
     * --------------------------------------------------------------
     */
    Route::middleware('role:User')
        ->name('user.')
        ->prefix('user')
        ->group(function () {
            //route for user only

        });
});
