<?php 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CvController;

// User page
Route::get('/', [CvController::class,'create']);
Route::post('/store', [CvController::class,'store']);

// Admin login form & post
Route::get('/admin/login', [AdminController::class,'loginForm']); // show form
Route::post('/admin/login', [AdminController::class,'login']);    // handle login

// Admin logout
Route::get('/admin/logout', [AdminController::class,'logout']);

// Admin protected routes
Route::middleware(['admin'])->group(function() {
    Route::get('/admin', [CvController::class,'index']);
    Route::get('/edit/{id}', [CvController::class,'edit']);
    Route::post('/update/{id}', [CvController::class,'update']);
    Route::get('/delete/{id}', [CvController::class,'destroy']);
});