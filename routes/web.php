<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\UpdateProfileController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/custom-login', [AuthController::class, 'login'])->name('custom.login');
    Route::get('/register', [RegistrationController::class, 'index'])->name('register');
    Route::post('/custom-register', [RegistrationController::class, 'store'])->name('custom.register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, "index"])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/show/{id}', [HomeController::class, 'show'])->name('show');

    Route::middleware(['admin'])->group(function () {
        Route::get('/update-profile/{id}', [UpdateProfileController::class, 'index'])->name('update.profile');
        Route::put('/update-user/{id}', [UpdateProfileController::class, 'update'])->name('update.user');
        Route::post('/delete/{id}', [HomeController::class, 'destroy'])->name('delete.user');

        Route::prefix('/subject')->group(function () {
            Route::get('/index', [SubjectController::class, 'index'])->name('index.subject');
            Route::post('/create', [SubjectController::class, 'store'])->name('create.subject');
        });
    });
});
