<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\HomepageController;
<<<<<<< HEAD
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GalleryController;
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> 7d50a0652fc1f1bd9db1faa487e9f253bbedcdc7
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
<<<<<<< HEAD
Route::get('/galeri', [GalleryController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
=======

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {

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
>>>>>>> 7d50a0652fc1f1bd9db1faa487e9f253bbedcdc7
