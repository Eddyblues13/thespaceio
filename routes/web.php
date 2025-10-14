<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/contact', function () {
    return view('home.contact');
});

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/faq', function () {
    return view('home.faq');
});

Route::get('/investment', function () {
    return view('home.investment');
});

Route::get('/etf&funds', function () {
    return view('home.etf&funds');
});

Route::get('/insurance', function () {
    return view('home.insurance');
});

Route::get('/cohere', function () {
    return view('home.cohere');
});

Route::get('/microsoft', function () {
    return view('home.microsoft');
});

Route::get('/tesla', function () {
    return view('home.tesla');
});

Route::get('/stability', function () {
    return view('home.stability');
});

Route::get('/openai', function () {
    return view('home.openai');
});

Route::get('/mistral', function () {
    return view('home.mistral');
});

Route::get('/nvidia', function () {
    return view('home.nvidia');
});

Route::get('/oracle', function () {
    return view('home.oracle');
});

Route::get('/runway', function () {
    return view('home.runway');
});

Route::get('/scale', function () {
    return view('home.scale');
});

Route::get('/signup', function () {
    return view('home.signup');
});

Route::get('/inflection', function () {
    return view('home.inflection');
});

Route::get('/huggingface', function () {
    return view('home.huggingface');
});

Route::get('/google', function () {
    return view('home.google');
});

Route::get('/anthropic', function () {
    return view('home.anthropic');
});

Route::get('/cashflow', function () {
    return view('home.cashflow');
});

Route::get('/character', function () {
    return view('home.character');
});

Route::get('/facebook', function () {
    return view('home.facebook');
});

Route::get('/signin', function () {
    return view('home.signin');
});






// Login routes (only accessible to guests)
Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'showLoginForm'])->name('login.page');
    Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');
});

// Registration routes (only accessible to guests)
Route::middleware('guest')->group(function () {
    Route::get('/register', [App\Http\Controllers\Auth\AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'register'])->name('register.submit');
});

// Referral signup route (only accessible to guests)
Route::middleware('guest')->group(function () {
    Route::get('/signup/{referral_code}', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('referral.signup');
});





// Forgot Password routes
Route::get('/forgot-password', [App\Http\Controllers\Auth\AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [App\Http\Controllers\Auth\AuthController::class, 'sendResetLinkEmail'])->name('password.email');

// Password Reset routes
Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [App\Http\Controllers\Auth\AuthController::class, 'reset'])->name('password.update');
Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('user.logout');

// Email & User Verification
Route::get('user/v', [App\Http\Controllers\Auth\EmailVerificationController::class, 'emailVerify'])->name('email_verify');
Route::get('user/ver', [App\Http\Controllers\Auth\EmailVerificationController::class, 'userVerify'])->name('user_verify');
Route::get('/verify/{id}', [App\Http\Controllers\Auth\EmailVerificationController::class, 'verify'])->name('verify');
Route::post('/verify-code', [App\Http\Controllers\Auth\EmailVerificationController::class, 'verifyCode'])->name('verify.code');
Route::get('/resend-verification-code', [App\Http\Controllers\Auth\EmailVerificationController::class, 'resendVerificationCode'])->name('resend.verification.code');
Route::post('/skip-code', [App\Http\Controllers\Auth\EmailVerificationController::class, 'skipCode'])->name('skip.code');





Route::prefix('user')->middleware('user')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\User\UserController::class, 'dashboard'])->name('dashboard');
});
