<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\ProfileController;
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

    // Show events->topics->lessons->instructors

    Route::post('/check-token', [AuthController::class, 'checkToken'])->name('check.token');
});
// API
Route::post('/login', [AuthController::class, 'login'])->name('login');

// The auth:sanctum middleware is used to ensure that the user making the API request is authenticated
Route::middleware('auth:sanctum')->post('/check-token', [TokenController::class, 'checkToken'])->name('check.token');

Route::get('/dashboard', [EventController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);


require __DIR__ . '/auth.php';
