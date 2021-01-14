<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoggerController;
use App\Models\User;
use App\Models\Device;
use Illuminate\Support\Facades\Auth;

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

Route::get('/welcome', function () {
    return view('welcome');
})->name('login');

Route::get('/', [LoggerController::class, 'index']);

Route::get('/devices/{deviceId}/token', function($deviceId){
    return Auth::user()->devices()->findOrFail($deviceId);
})->middleware('auth');
