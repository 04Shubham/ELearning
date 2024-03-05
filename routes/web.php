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
    
    Route::get('/trash',[App\Http\Controllers\Admin\CategoryController::class,'trash']);
    Route::get('/trash/restore/{id}',[App\Http\Controllers\Admin\CategoryController::class,'restore']);
    Route::get('/trash/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class,'delete']);

    Route::get('/featured/categories',[App\Http\Controllers\Admin\FeaturedController::class,'view_featured_categories']);
    Route::post('/featured/categories/store',[App\Http\Controllers\Admin\FeaturedController::class,'store_featured_category']);
    Route::get('/featured/courses',[App\Http\Controllers\Admin\FeaturedController::class,'view_featured_courses']);
    Route::post('/featured/categories/delete/{id}',[App\Http\Controllers\Admin\FeaturedController::class,'remove_featured_category']);
 

}); 