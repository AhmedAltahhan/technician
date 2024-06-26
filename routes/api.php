<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register-technician', [AuthController::class, 'registerTechnician'])->name('register');
Route::post('register-client', [AuthController::class, 'registerClient'])->name('register_client');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');

