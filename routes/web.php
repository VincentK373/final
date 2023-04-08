<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\DashboardController;
use App\Models\User;
use App\Models\Category;
use App\Models\Article;
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


Route::get('/', [ArticleController::class, 'home']);

Route::get('/about', [ArticleController::class, 'about']);

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/{article:slug}', [ArticleController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'category']);

// 
Route::get('/login', [LogInController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LogInController::class, 'auth']);
Route::get('/signup', [SignUpController::class, 'signup'])->middleware('guest');
Route::post('/signup', [SignUpController::class, 'store']);
Route::post('/logout', [LogInController::class, 'logout']);

Route::get('/dashboard/checkslug', [DashboardController::class, 'checkslug'])->middleware('auth');

Route::get('/dashboard/manage-users', function () {
    return view('dashboard.manageuser', [
        'users' => User::orderBy('username')->get(),
        'title' => 'Dashboard',
    ]);
})->middleware('auth');

Route::get('/dashboard/manage-categories', [CategoryController::class, 'manage'])->middleware('auth');
Route::post('/dashboard/manage-categories', [CategoryController::class, 'store'])->middleware('auth');

Route::get('/dashboard/change-profile', [DashboardController::class, 'change'])->middleware('auth');

Route::get('/dashboard/my-profile', [DashboardController::class, 'profile'])->middleware('auth');
// Route::delete('/dashboard/manage-categories/{slug}', CategoryController::class, 'delete')->middleware('auth');


Route::resource('/dashboard', DashboardController::class)->middleware('auth');
