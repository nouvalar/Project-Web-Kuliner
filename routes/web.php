<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SesiController;
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



Route::get('/', [SesiController::class, 'showLoginForm'])->name('login');
Route::post('/', [SesiController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/logout', [SesiController::class, 'logout']);



Route::get('/home', function () {
    return redirect('/index');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/base', [AdminController::class, 'user'])->name('base');
    Route::get('/charts', [ChartsController::class, 'charts'])->name('charts');
    Route::get('/review', [ReviewController::class, 'review'])->name('review');
    Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::get('/favorit', [FavoritController::class, 'favorit'])->name('favorit');
    Route::post('/favorit', [FavoritController::class, 'store'])->name('favorit');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [ItemController::class, 'admin'])->name('admin');
    Route::post('/admin/add', [ItemController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit/{id}', [ItemController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/update/{id}', [ItemController::class, 'update'])->name('admin.update');
    Route::delete('/admin/delete/{id}', [ItemController::class, 'destroy'])->name('admin.delete');
});
