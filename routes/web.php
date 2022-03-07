<?php

use App\Http\Controllers\Pages;
use App\Http\Controllers\Post;
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

Route::get('/', [Pages::class, 'index']);
Route::get('/about', [Pages::class, 'about']);
Route::get('/services', [Pages::class, 'services']);
Route::resource('/posts', Post::class);
Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
