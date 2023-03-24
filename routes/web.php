<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestCompaniesController;
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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Display Token to User
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    // User check token  Show testCompanies table to user if token correct 
    Route::post('/account', [TestCompaniesController::class, 'store'])->name('check.token');
    // Show events->topics->lessons->instructors
    Route::get('/dashboard', [EventController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);
});

require __DIR__ . '/auth.php';
