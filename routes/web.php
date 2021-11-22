<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GalleryController;
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