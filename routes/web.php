<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CarController;
use App\Exports\RentalReportExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', [CustomerController::class, 'home'])->name('customer.home');

// Routes untuk registrasi dan login
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Routes untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
        Route::prefix('admin/cars')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\CarController::class, 'index'])->name('admin.cars.index');
                Route::get('create', [App\Http\Controllers\Admin\CarController::class, 'create'])->name('admin.cars.create');
                Route::post('store', [App\Http\Controllers\Admin\CarController::class, 'store'])->name('admin.cars.store');
                Route::get('{id}/edit', [App\Http\Controllers\Admin\CarController::class, 'edit'])->name('admin.cars.edit');
                Route::put('{id}', [App\Http\Controllers\Admin\CarController::class, 'update'])->name('admin.cars.update');
                Route::delete('{id}', [App\Http\Controllers\Admin\CarController::class, 'destroy'])->name('admin.cars.destroy');
            });
        Route::prefix('admin/rentals')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\RentalController::class, 'index'])->name('admin.rentals.index');
            Route::get('{id}', [App\Http\Controllers\Admin\RentalController::class, 'show'])->name('admin.rentals.show');
        });
        Route::prefix('admin/users')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
            Route::get('create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
            Route::post('store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
            Route::get('{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
            Route::put('{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
            Route::delete('{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
        });
        Route::get('/reports', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('admin.reports.index');

        Route::get('/reports/export', function() {
            return Excel::download(new RentalReportExport, 'laporan_rental.xlsx');
        })->name('admin.reports.export');
});

// Routes untuk customer
Route::middleware(['auth', 'role:customer'])->group(function () {
    // Dashboard dan Profil
    Route::get('customer/dashboard', [App\Http\Controllers\Customer\CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/profile', [App\Http\Controllers\Customer\CustomerController::class, 'profile'])->name('customer.profile');

    // Penyewaan
    Route::get('/rentals/new', [App\Http\Controllers\Customer\RentalController::class, 'index'])->name('customer.rentals.new'); // Menampilkan mobil yang tersedia untuk disewa
    Route::post('/rentals/store', [App\Http\Controllers\Customer\RentalController::class, 'store'])->name('customer.rentals.store'); // Menyimpan penyewaan

    // Penyewaan Aktif dan Riwayat Penyewaan
    Route::get('/rentals/active', [App\Http\Controllers\Customer\CustomerController::class, 'rentalActive'])->name('customer.rentals.active');
    Route::get('/rentals/history', [App\Http\Controllers\Customer\CustomerController::class, 'rentalHistory'])->name('customer.rentals.history');
});

