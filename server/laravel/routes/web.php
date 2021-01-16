<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoggerController;

/*
|:---------------------------------------------------------------------------|
| Web Routes                                                                 |
| -------------------------------------------------------------------------- |
|                                                                            |
| Here is where you can register web routes for your application. These      |
| routes are loaded by the RouteServiceProvider within a group which         |
| contains the "web" middleware group. Now create something great!           |
|                                                                            |
*/

Route::get('/', [LoggerController::class, 'index'])->middleware(['auth'])->name('index');

Route::get('/dashboard',function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/devicesAdd', [LoggerController::class, 'devices'])->middleware(['auth'])->name('addDevices');

Route::post('/devicesAdd', [LoggerController::class, 'deviceAdd']);

require __DIR__.'/auth.php';
