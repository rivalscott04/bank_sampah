<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NasabahController;

// Guest routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Kelola Nasabah
    Route::get('/nasabah', [AdminController::class, 'nasabah'])->name('nasabah');
    Route::get('/nasabah/create', [AdminController::class, 'createNasabah'])->name('nasabah.create');
    Route::post('/nasabah', [AdminController::class, 'storeNasabah'])->name('nasabah.store');
    Route::get('/nasabah/{user}/edit', [AdminController::class, 'editNasabah'])->name('nasabah.edit');
    Route::put('/nasabah/{user}', [AdminController::class, 'updateNasabah'])->name('nasabah.update');
    Route::delete('/nasabah/{user}', [AdminController::class, 'destroyNasabah'])->name('nasabah.destroy');

    // Kelola Kategori
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
    Route::get('/categories/create', [AdminController::class, 'createCategory'])->name('categories.create');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('categories.store');
    Route::get('/categories/{category}/edit', [AdminController::class, 'editCategory'])->name('categories.edit');
    Route::put('/categories/{category}', [AdminController::class, 'updateCategory'])->name('categories.update');
    Route::delete('/categories/{category}', [AdminController::class, 'destroyCategory'])->name('categories.destroy');

    // Kelola Sampah
    Route::get('/wastes', [AdminController::class, 'wastes'])->name('wastes');
    Route::get('/wastes/create', [AdminController::class, 'createWaste'])->name('wastes.create');
    Route::post('/wastes', [AdminController::class, 'storeWaste'])->name('wastes.store');
    Route::get('/wastes/{waste}/edit', [AdminController::class, 'editWaste'])->name('wastes.edit');
    Route::put('/wastes/{waste}', [AdminController::class, 'updateWaste'])->name('wastes.update');
    Route::delete('/wastes/{waste}', [AdminController::class, 'destroyWaste'])->name('wastes.destroy');

    // Kelola Transaksi
    Route::get('/transactions', [AdminController::class, 'transactions'])->name('transactions');
    Route::get('/transactions/create', [AdminController::class, 'createTransaction'])->name('transactions.create');
    Route::post('/transactions', [AdminController::class, 'storeTransaction'])->name('transactions.store');
    Route::get('/transactions/{transaction}/edit', [AdminController::class, 'editTransaction'])->name('transactions.edit');
    Route::put('/transactions/{transaction}', [AdminController::class, 'updateTransaction'])->name('transactions.update');
    Route::delete('/transactions/{transaction}', [AdminController::class, 'destroyTransaction'])->name('transactions.destroy');

    // Kelola Permintaan Jemput
    Route::get('/pickup-requests', [AdminController::class, 'pickupRequests'])->name('pickup-requests');
    Route::put('/pickup-requests/{pickupRequest}/status', [AdminController::class, 'updatePickupStatus'])->name('pickup-requests.update-status');

    // Kelola Poin
    Route::get('/points', [AdminController::class, 'points'])->name('points');
    Route::put('/points/{point}', [AdminController::class, 'updatePoints'])->name('points.update');
});

// Nasabah routes
Route::middleware(['auth', 'nasabah'])->prefix('nasabah')->name('nasabah.')->group(function () {
    Route::get('/dashboard', [NasabahController::class, 'dashboard'])->name('dashboard');

    // Profile
    Route::get('/profile', [NasabahController::class, 'profile'])->name('profile');
    Route::put('/profile', [NasabahController::class, 'updateProfile'])->name('profile.update');

    // Lihat Daftar Sampah
    Route::get('/wastes', [NasabahController::class, 'wastes'])->name('wastes');

    // Riwayat Transaksi
    Route::get('/transactions', [NasabahController::class, 'transactions'])->name('transactions');

    // Permintaan Jemput Sampah
    Route::get('/pickup-requests', [NasabahController::class, 'pickupRequests'])->name('pickup-requests');
    Route::get('/pickup-requests/create', [NasabahController::class, 'createPickupRequest'])->name('pickup-requests.create');
    Route::post('/pickup-requests', [NasabahController::class, 'storePickupRequest'])->name('pickup-requests.store');
    Route::get('/pickup-requests/{pickupRequest}', [NasabahController::class, 'showPickupRequest'])->name('pickup-requests.show');
    Route::get('/pickup-requests/{pickupRequest}/edit', [NasabahController::class, 'editPickupRequest'])->name('pickup-requests.edit');
    Route::put('/pickup-requests/{pickupRequest}', [NasabahController::class, 'updatePickupRequest'])->name('pickup-requests.update');
    Route::delete('/pickup-requests/{pickupRequest}', [NasabahController::class, 'destroyPickupRequest'])->name('pickup-requests.destroy');
});

// Redirect authenticated users to appropriate dashboard
Route::get('/dashboard', function () {
    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('nasabah.dashboard');
    }
})->middleware('auth')->name('dashboard');
