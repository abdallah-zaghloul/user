<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\ConfirmPasswordController;
use Modules\User\Http\Controllers\ForgotPasswordController;
use Modules\User\Http\Controllers\HomeController;
use Modules\User\Http\Controllers\LoginController;
use Modules\User\Http\Controllers\RegisterController;
use Modules\User\Http\Controllers\ResetPasswordController;
use Modules\User\Http\Controllers\VerificationController;

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
],function (){
    /* home */
    Route::get('home', [HomeController::class,'index'])->name('home');

    /* login */
    Route::get('login', [LoginController::class,'showLoginForm'])->name('showLoginForm');
    Route::post('login', [LoginController::class,'login'])->name('login');
    Route::post('logout', [LoginController::class,'logout'])->name('logout');

    /* register */
    Route::get('register', [RegisterController::class,'showRegistrationForm'])->name('showRegistrationForm');
    Route::post('register', [RegisterController::class,'register'])->name('register');

    /* password-confirm */
    Route::get('password/confirm',[ConfirmPasswordController::class,'showConfirmForm'])->name('password.showConfirmForm');
    Route::post('password/confirm',[ConfirmPasswordController::class,'confirm'])->name('password.confirm');

    /* password-forgot */
    Route::get('password/email',[ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.sendResetLinkEmail');
    Route::get('password/reset',[ForgotPasswordController::class,'showLinkRequestForm'])->name('password.showLinkRequestForm');
    /* password-reset */
    Route::get('password/reset/{token}',[ResetPasswordController::class,'showResetForm'])->name('password.showResetForm');
    Route::post('password/reset',[ResetPasswordController::class,'reset'])->name('password.reset');
});
