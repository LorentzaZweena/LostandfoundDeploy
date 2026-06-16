<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Models\Item;
use Illuminate\Support\Facades\Route;

Route::get('/', [ItemController::class,'home']);
Route::get('/items', [ItemController::class,'index']);
Route::get('/report', [ItemController::class,'create']);
Route::post('/report', [ItemController::class,'store']) ->middleware('throttle:5,1');
Route::get('/items/{item}', [ItemController::class,'show']);

Route::middleware('auth')->group(function () {
    Route::put('/items/{item}', [ItemController::class,'update']);
    Route::delete('/items/{item}', [ItemController::class,'destroy']);

    Route::get('/profile', [ProfileController::class, 'index']);
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto']);
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->middleware('auth')->name('profile.edit');
    Route::post('/pay', [PaymentController::class, 'pay']);

    Route::get('/admin/reports', [ItemController::class, 'pendingReports']);
    Route::post('/admin/reports/{item}/approve', [ItemController::class, 'approve']);
    Route::post('/admin/reports/{item}/reject', [ItemController::class, 'reject']);
});

require __DIR__.'/auth.php';