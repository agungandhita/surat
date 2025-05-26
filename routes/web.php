<?php

use App\Http\Controllers\admin\ArsipController;
use App\Http\Controllers\admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register/post', [RegisterController::class, 'store']);

    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'authenticate']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('admin')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

    Route::prefix('admin')->group(function () {
        Route::get('/arsip', [ArsipController::class, 'index'])->name('admin.arsip.index');
        Route::post('/arsip', [ArsipController::class, 'store'])->name('admin.arsip.store');
        Route::put('/arsip/{arsip}', [ArsipController::class, 'update'])->name('admin.arsip.update');
        Route::delete('/arsip/{arsip}', [ArsipController::class, 'destroy'])->name('admin.arsip.destroy');
    });
});
