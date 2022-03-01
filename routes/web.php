<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FifteenTimerController;
use App\Http\Controllers\ThirtyTimerController;

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

Route::middleware('auth:users')->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('fif-timer', FifteenTimerController::class);
    Route::resource('thi-timer', ThirtyTimerController::class);

});

require __DIR__.'/auth.php';
