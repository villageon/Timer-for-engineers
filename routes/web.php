<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FifteenTimerController;
use App\Http\Controllers\ThirtyTimerController;
use App\Http\Controllers\TimerController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::middleware('auth:users')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('fif-timer')->group(function(){
        Route::get('/', [FifteenTimerController::class, 'index'])->name('fif-timer.index');
        Route::post('/record', [FifteenTimerController::class, 'record'])->name('fif-timer.record');
    });

    Route::prefix('thi-timer')->group(function(){
        Route::get('/', [ThirtyTimerController::class, 'index'])->name('thi-timer.index');
        Route::post('/record', [ThirtyTimerController::class, 'record'])->name('thi-timer.record');
    });

    Route::get('/timerHistory', [TimerController::class, 'history'])->name('timerHistory');
    // Route::post('/timerHistory', [TimerController::class, 'total']);
    
    Route::get('/detail/{id}', [TimerController::class, 'detail'])->name('detail');

    Route::get('/rank', [TimerController::class, 'rank'])->name('rank');
    // Route::post('/rank', [TimerController::class, 'rankDate']);
    
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/edit', [UserController::class, 'edit'])->name('edit');
    Route::post('/update', [UserController::class, 'update'])->name('profile.update');

});

require __DIR__ . '/auth.php';
