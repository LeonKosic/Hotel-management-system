<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Room;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/dashboard', [RoomController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/dashboard', [RoomController::class, 'dashboardSearch']);
    Route::post('/reservations', [ReservationController::class, 'store']);
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/services', [ServiceController::class, 'index'])->name('services');
    Route::post('/services', [ServiceController::class, 'store']);
    Route::get('/services/create', [ServiceController::class, 'create']);
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
    Route::post('/rooms', [RoomController::class, 'store']);
    Route::get('/rooms/create', [RoomController::class, 'create']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/rooms-services/{room}', [RoomController::class, 'syncServices']);
    Route::post('/rooms-services/{room}', [RoomController::class, 'addServices']);
    Route::get('/rooms/{room}', [RoomController::class, 'show']);
    Route::post('/services/{id}', [ServiceController::class, 'update']);
    Route::post('/reservations/{id}', [ReservationController::class, 'update']);
    Route::delete('/reservations/{id}', [ReservationController::class, 'destroy']);
    Route::post('/rooms/{id}', [RoomController::class, 'update']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::post('/users/{id}', [UserController::class, 'update']);
    Route::get('/services/{service}', [ServiceController::class, 'show']);
   // Route::patch('/rooms/{room}', [RoomController::class, 'update']);
    Route::delete('/rooms/{room}', [RoomController::class, 'destroy']);
    Route::delete('/services/{service}', [ServiceController::class, 'destroy']);
    Route::patch('/users/{user}', [ UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
    Route::get('/rooms/{room}/edit', [ RoomController::class, 'edit']);
    Route::get('/users/{user}/edit', [ UserController::class, 'edit']);
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit']);
});

require __DIR__.'/auth.php';
