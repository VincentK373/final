<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
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


Route::get('/', [ProductController::class, 'home']);
Route::get('/about', [ProductController::class, 'about']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'category']);


Route::get('/login', [LogInController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LogInController::class, 'auth']);
Route::get('/signup', [SignUpController::class, 'signup'])->middleware('guest');
Route::post('/signup', [SignUpController::class, 'store']);
Route::post('/logout', [LogInController::class, 'logout']);


Route::get('/dashboard/checkslug', [AdminController::class, 'checkslug'])->middleware('auth');
Route::resource('/dashboard', AdminController::class)->middleware('auth');

Route::get('/manage-categories', [CategoryController::class, 'manage'])->middleware('admin');
Route::post('/manage-categories', [CategoryController::class, 'store'])->middleware('admin');
Route::delete('/manage-categories/{category:slug}', [CategoryController::class, 'delete'])->middleware('admin');


Route::get('/profile', function () {
    return view('dashboard.profile', [
        'title' => 'Dashboard',
        'name' => auth()->user()->name,
        'username' => auth()->user()->username,
        'email' => auth()->user()->email,
        'phone' => auth()->user()->phone,
        'status' => auth()->user()->admin_id
    ]);
})->middleware('auth');