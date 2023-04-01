<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GenreController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', [ArticleController::class, 'home']);

Route::get('/about', [ArticleController::class, 'about']);

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/{article:slug}', [ArticleController::class, 'show']);

Route::get('/categories', [GenreController::class, 'genre']);
