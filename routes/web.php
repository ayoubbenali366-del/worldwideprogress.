<?php 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CvController;


Route::get('/', [CvController::class,'create']);
Route::post('/store', [CvController::class,'store']);


Route::get('/admin/login', [AdminController::class,'loginForm']); 
Route::post('/admin/login', [AdminController::class,'login']);    


Route::get('/admin/logout', [AdminController::class,'logout']);

Route::middleware(['admin'])->group(function() {
    Route::get('/admin', [CvController::class,'index']);
    Route::get('/edit/{id}', [CvController::class,'edit']);
    Route::post('/update/{id}', [CvController::class,'update']);
    Route::get('/delete/{id}', [CvController::class,'destroy']);
});