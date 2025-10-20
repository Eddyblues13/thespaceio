<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\InvestmentController;
use App\Http\Controllers\User\WithdrawalController;
use App\Http\Controllers\User\TransactionController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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





// Password Reset Routes
// Password Reset Routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');

Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('password/reset', [ResetPasswordController::class, 'reset'])
    ->name('password.update');
Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('user.logout');

// Email & User Verification
Route::get('user/v', [App\Http\Controllers\Auth\EmailVerificationController::class, 'emailVerify'])->name('email_verify');
Route::get('user/ver', [App\Http\Controllers\Auth\EmailVerificationController::class, 'userVerify'])->name('user_verify');
Route::get('/verify/{id}', [App\Http\Controllers\Auth\EmailVerificationController::class, 'verify'])->name('verify');
Route::post('/verify-code', [App\Http\Controllers\Auth\EmailVerificationController::class, 'verifyCode'])->name('verify.code');
Route::get('/resend-verification-code', [App\Http\Controllers\Auth\EmailVerificationController::class, 'resendVerificationCode'])->name('resend.verification.code');
Route::post('/skip-code', [App\Http\Controllers\Auth\EmailVerificationController::class, 'skipCode'])->name('skip.code');





Route::prefix('user')->middleware('user')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::get('/todaysgain', [DashboardController::class, 'todaysGain'])->name('dashboard.todaysgain');
    Route::get('/portfolio', [DashboardController::class, 'portfolio'])->name('dashboard.portfolio');

    Route::get('/insurance', [DashboardController::class, 'insurance'])->name('dashboard.insurance');

    Route::get('/account-manager', [DashboardController::class, 'accountManager'])->name('dashboard.accountmanager');


    Route::get('/installment-payment', [DashboardController::class, 'installmentPayment'])->name('dashboard.installmentpayment');



    // Deposit
    Route::get('/deposit', [DepositController::class, 'index'])->name('dashboard.deposit');
    Route::post('/deposit', [DepositController::class, 'store'])->name('deposit.store');
    Route::post('/deposit/generate-address', [DepositController::class, 'generateCryptoAddress'])->name('deposit.generate.address');
    Route::get('/deposit/payment-details/{method}', [DepositController::class, 'getPaymentDetails'])->name('deposit.payment.details');

    // Investments
    Route::get('/investments', [InvestmentController::class, 'index'])->name('dashboard.investments');

    // Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('dashboard.settings');
    Route::post('/settings/profile', [SettingsController::class, 'updateProfile'])->name('settings.profile.update');
    Route::post('/settings/security', [SettingsController::class, 'updateSecurity'])->name('settings.security.update');
    Route::post('/settings/notifications', [SettingsController::class, 'updateNotifications'])->name('settings.notifications.update');

    // Transactions
    Route::get('/transactions', [TransactionController::class, 'index'])->name('dashboard.transactions');
    Route::post('/transactions/deposit', [TransactionController::class, 'storeDeposit'])->name('transactions.deposit.store');
    Route::post('/transactions/withdrawal', [TransactionController::class, 'storeWithdrawal'])->name('transactions.withdrawal.store');

    // Withdrawal
    Route::get('/withdrawal', [WithdrawalController::class, 'index'])->name('dashboard.withdrawal');
    Route::post('/withdrawal', [WithdrawalController::class, 'store'])->name('withdrawal.store');
});
