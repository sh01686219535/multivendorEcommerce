<?php

use App\Http\Controllers\backend\AdminContoller;
use App\Http\Controllers\backend\AdminvendorprofileController;
use App\Http\Controllers\backend\AjaxController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ChildCategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\ProfileContoller;
use App\Http\Controllers\backend\SliderController;
use Illuminate\Support\Facades\Route;


// Admin Route
Route::get('dashboard',[AdminContoller::class,'adminDashboard'])->name('dashboard');
// adminProfile Route
Route::get('profile',[ProfileContoller::class,'adminProfile'])->name('profile');
Route::post('profile/update',[ProfileContoller::class,'profileUpdate'])->name('profile.update');
Route::post('password/update',[ProfileContoller::class,'passwordUpdate'])->name('password.update');
// Slider Route CURD
Route::resource('slider',SliderController::class);
// Category Route Curd
Route::resource('category',CategoryController::class);
// SubCategory Route Curd
Route::resource('subCategory',SubCategoryController::class);
// childCategory Route Curd
Route::resource('childCategory',ChildCategoryController::class);
// brand Route Curd
Route::resource('banner',BannerController::class);
// Vendor Profile Route Curd
Route::resource('vendor',AdminvendorprofileController::class);
// Product Route Curd
Route::resource('product',ProductController::class);
// ajax call route
Route::get('/get/subCategor',[AjaxController::class,'getSubCategor'])->name('get.subCategor');