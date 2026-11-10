<?php

use Illuminate\Support\Facades\Route;

// Authentication
use App\Http\Controllers\AuthController;

// Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VenueController as AdminVenueController;
use App\Http\Controllers\Admin\VerifikasiVenueController;
use App\Http\Controllers\Admin\JenisLapanganController;
use App\Http\Controllers\Admin\WilayahController;
use App\Http\Controllers\Admin\TransaksiController as AdminTransaksiController;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;

// Owner
use App\Http\Controllers\Owner\DashboardController as OwnerDashboardController;
use App\Http\Controllers\Owner\ProfilController as OwnerProfilController;
use App\Http\Controllers\Owner\VenueController as OwnerVenueController;
use App\Http\Controllers\Owner\LapanganController as OwnerLapanganController;
use App\Http\Controllers\Owner\JadwalController;
use App\Http\Controllers\Owner\BookingController as OwnerBookingController;
use App\Http\Controllers\Owner\PendapatanController;

// Customer
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\VenueController as CustomerVenueController;
use App\Http\Controllers\Customer\LapanganController as CustomerLapanganController;
use App\Http\Controllers\Customer\BookingController as CustomerBookingController;
use App\Http\Controllers\Customer\RatingController;

// Payment
use App\Http\Controllers\Payment\MidtransWebhookController;

// PUBLIC
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// AUTHENTICATION
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.process');

});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ADMIN
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // Users
        Route::resource('/users', UserController::class);

        // Venue
        Route::resource('/venue', AdminVenueController::class)
            ->only(['index', 'show']);

        // Verifikasi Venue
        Route::resource('/verifikasi-venue', VerifikasiVenueController::class)
            ->only(['index', 'show', 'update']);

        // Jenis Lapangan
        Route::resource('/jenis-lapangan', JenisLapanganController::class);

        // Wilayah
        Route::resource('/provinsi', WilayahController::class);
        Route::resource('/kota', WilayahController::class);
        Route::resource('/kecamatan', WilayahController::class);

        // Transaksi
        Route::resource('/transaksi', AdminTransaksiController::class)
            ->only(['index', 'show']);

        // Ticket
        Route::resource('/ticket', AdminTicketController::class)
            ->only(['index', 'show', 'update']);

    });

// OWNER
Route::middleware(['auth', 'role:owner'])
    ->prefix('owner')
    ->name('owner.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [OwnerDashboardController::class, 'index'])
            ->name('dashboard');

        // Profil
        Route::resource('/profil', OwnerProfilController::class)
            ->only(['edit', 'update']);

        // Venue
        Route::resource('/venue', OwnerVenueController::class);

        // Lapangan
        Route::resource('/lapangan', OwnerLapanganController::class);

        // Jadwal
        Route::resource('/jadwal', JadwalController::class);

        // Booking
        Route::resource('/booking', OwnerBookingController::class)
            ->only(['index', 'show']);

        // Pendapatan
        Route::resource('/pendapatan', PendapatanController::class)
            ->only(['index']);

    });

// CUSTOMER
Route::middleware(['auth', 'role:customer'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {

        // Home
        Route::get('/home', [HomeController::class, 'index'])
            ->name('home');

        // Venue
        Route::resource('/venue', CustomerVenueController::class)
            ->only(['index', 'show']);

        // Lapangan
        Route::resource('/lapangan', CustomerLapanganController::class)
            ->only(['index', 'show']);

        // Booking
        Route::resource('/booking', CustomerBookingController::class)
            ->only(['index', 'show', 'store']);

        // Rating
        Route::resource('/rating', RatingController::class)
            ->only(['create', 'store']);

    });


// PAYMENT WEBHOOK
Route::post('/payment/midtrans/webhook', [MidtransWebhookController::class, 'handle'])
    ->name('payment.midtrans.webhook');
