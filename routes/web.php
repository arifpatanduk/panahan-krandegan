<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\HomepageController;
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
