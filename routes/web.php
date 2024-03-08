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

Route::get('/category/{slug}',[App\Http\Controllers\Client\CategoryController::class,'index'] );

Route::get('/category/{category_slug}/{course_slug}',[App\Http\Controllers\Client\CourseController::class,'index'] );

Route::get('/enroll/{course_id}',[App\Http\Controllers\Client\EnrollmentController::class, 'store'] )->middleware(['auth']);
Route::get('/profile',[App\Http\Controllers\Client\ProfileController::class, 'index'] )->middleware(['auth']);

Route::get('/courses/{slug}',[App\Http\Controllers\Client\CourseController::class,'view'])->middleware(['auth']);

Route::prefix('admin')->middleware(['auth','admin'])->group(function ()  {
    Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index']);
    Route::get('/categories',[App\Http\Controllers\Admin\CategoryController::class,'index']);
    Route::get('/category/create',[App\Http\Controllers\Admin\CategoryController::class,'create']);
    Route::post('/category/create',[App\Http\Controllers\Admin\CategoryController::class,'store']);
    Route::get('/category/edit/{id}',[App\Http\Controllers\Admin\CategoryController::class,'edit']);
    Route::post('/category/update/{id}',[App\Http\Controllers\Admin\CategoryController::class,'update']);
    Route::get('/category/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class,'destory']);

    Route::get('/courses',[App\Http\Controllers\Admin\CourseController::class,'index']);
    Route::get('/course/create',[App\Http\Controllers\Admin\CourseController::class,'create']);
    Route::post('/course/create',[App\Http\Controllers\Admin\CourseController::class,'store']);
    Route::get('/course/edit/{id}',[App\Http\Controllers\Admin\CourseController::class,'edit']);
    Route::post('/course/update/{id}',[App\Http\Controllers\Admin\CourseController::class,'update']);
    Route::get('/course/delete/{id}',[App\Http\Controllers\Admin\CourseController::class,'destory']);
    
    Route::get('/categories/trash',[App\Http\Controllers\Admin\CategoryController::class,'trash']);
    Route::get('/trash/category/restore/{id}',[App\Http\Controllers\Admin\CategoryController::class,'restore']);
    Route::get('/trash/category/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class,'delete']);
    
    Route::get('/courses/trash',[App\Http\Controllers\Admin\CourseController::class,'trash']);
    Route::get('/trash/course/restore/{id}',[App\Http\Controllers\Admin\CourseController::class,'restore']);
    Route::get('/trash/course/delete/{id}',[App\Http\Controllers\Admin\CourseController::class,'delete']);

    Route::get('/featured/categories',[App\Http\Controllers\Admin\FeaturedController::class,'view_featured_categories']);
    Route::post('/featured/categories/store',[App\Http\Controllers\Admin\FeaturedController::class,'store_featured_category']);
    Route::get('/featured/categories/delete/{id}',[App\Http\Controllers\Admin\FeaturedController::class,'remove_featured_category']);

    Route::get('/featured/courses',[App\Http\Controllers\Admin\FeaturedController::class,'view_featured_courses']);
    Route::post('/featured/courses/store',[App\Http\Controllers\Admin\FeaturedController::class,'store_featured_course']);
    Route::get('/featured/courses/delete/{id}',[App\Http\Controllers\Admin\FeaturedController::class,'remove_featured_course']);
   
   
 
 

}); 