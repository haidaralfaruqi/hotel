<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesananController;

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', [IndexController::class, 'index'])->name('index');

// // Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
// // });
Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        

        Route::prefix('pesanan')->group(function () {
            Route::get('/', [PesananController::class, 'index'])->name('admin.pesanan.index');
            Route::get('/{id}/edit', [PesananController::class, 'edit'])->name('admin.pesanan.edit');
            Route::put('/{id}', [PesananController::class, 'update'])->name('admin.pesanan.update');
            Route::delete('/{id}', [PesananController::class, 'destroy'])->name('admin.pesanan.destroy');
        });

        Route::prefix('users')->group(function () {
            Route::get('/', [AdminController::class, 'showUsers'])->name('admin.users.index');
            Route::get('/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
            Route::put('/{user}', [AdminController::class, 'update'])->name('admin.users.update');
            Route::delete('/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
        });

        Route::prefix('hotels')->group(function () {
            Route::get('/create', [HotelController::class, 'create'])->name('create-hotel');
            Route::post('/', [HotelController::class, 'store'])->name('store-hotel');
            Route::get('/', [HotelController::class, 'index'])->name('admin.hotels.index');
            Route::get('/{hotel}/edit', [HotelController::class, 'edit'])->name('edit-hotel');
            Route::put('/{hotel}', [HotelController::class, 'update'])->name('update-hotel');
            Route::delete('/{hotel}', [HotelController::class, 'destroy'])->name('delete-hotel');
        });
    });
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['user'])->group(function () {
        
        // tambahkan route CRUD lainnya di sini
        Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
        // tambahkan route CRUD lainnya di sini
        Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian');
        Route::get('/pembelian/{id}/edit', [PembelianController::class, 'edit'])->name('edit-pembelian');
        Route::put('/pembelian/{id}', [PembelianController::class, 'update'])->name('update-pembelian'); // Mengubah metode menjadi PUT
        Route::post('/process-pembelian', [PembelianController::class, 'process'])->name('process-pembelian');
    });
});
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


require __DIR__.'/auth.php';
