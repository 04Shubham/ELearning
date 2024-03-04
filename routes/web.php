<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;

Auth::routes();

Route::get('/', function () {
    return view('layouts.client.home');
});


// Route::get('/admin/dashboard', function () {
//     return view('layouts.admin.dashboard');
// })->middleware(['auth', 'admin']);


Route::prefix('admin')->middleware(['auth','admin'])->group(function ()  {
    Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index']);

    Route::get('/categories',[App\Http\Controllers\Admin\CategoryController::class,'index']);
    Route::get('/category/create',[App\Http\Controllers\Admin\CategoryController::class,'create']);
    Route::post('/category/create',[App\Http\Controllers\Admin\CategoryController::class,'store']);
    Route::get('/category/edit/{id}',[App\Http\Controllers\Admin\CategoryController::class,'edit']);
    Route::post('/category/update/{id}',[App\Http\Controllers\Admin\CategoryController::class,'update']);
    Route::get('/category/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class,'destory']);
}); 