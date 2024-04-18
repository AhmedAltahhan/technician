<?php

use App\Http\Controllers\Api\Admin\TechnicanController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum','role:admin'])->group(function () {
    Route::patch('active/{id}', [TechnicanController::class, 'active'])->name('active');
    Route::get('technicans', [TechnicanController::class, 'all'])->name('active');
});

