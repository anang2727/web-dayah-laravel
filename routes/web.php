<?php

use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\GuruPanel\GuruController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SantriPanel\SantriController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::middleware(['auth', 'role:admin'])->group(function () {
    // Admin Dashboard
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


    // Halaman Guru
    Route::get('/admin/guru', [GuruController::class, 'index'])->name('guru.dashboard');
    Route::post('/admin/guru', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/admin/guru/{guru}/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::put('/admin/guru/{guru}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/admin/guru/{guru}', [GuruController::class, 'destroy'])->name('guru.destroy');
    Route::get('/admin/guru/{id}', [GuruController::class, 'show'])->name('guru.show');

    // Halaman Santri 
    Route::get('/admin/santri', [SantriController::class, 'index'])->name('santri.dashboard');
    Route::post('/admin/santri', [SantriController::class, 'store'])->name('santri.store');
    Route::get('/admin/santri/{santri}/edit', [SantriController::class, 'edit'])->name('santri.edit');
    Route::put('/admin/santri/{santri}', [SantriController::class, 'update'])->name('santri.update');
    Route::delete('/admin/santri/{santri}', [SantriController::class, 'destroy'])->name('santri.destroy');
    Route::get('/admin/santri/{id}', [SantriController::class, 'show'])->name('santri.show');

    // Halaman Users 
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.dashboard');
    Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('users.show');
});


Route::middleware(['auth', 'role:guru'])->group(function () {
});

Route::middleware(['auth', 'role:santri'])->group(function () {
});
