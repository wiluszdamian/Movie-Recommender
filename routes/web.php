<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie');

Route::middleware(['guest'])->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    // Register
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store'])->name('register');

    // Verification Email
    Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'verify'])->name('verification.verify');

    // Forgot Password
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password.index');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('forgot-password.send-reset-link');

    // Reset password
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::get('/demo', [DemoController::class, 'demo'])->name('demo');

Route::get('/random', function () {
    return view('random.spin');
});

Route::get('/news', function () {
    return view('news.changelog');
});

Route::get('/movie', function () {
    return view('details.movie-detail');
});

Route::fallback(function () {
    return redirect('/');
});
