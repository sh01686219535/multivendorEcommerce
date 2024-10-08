<?php

use App\Http\Controllers\backend\AdminContoller;
use App\Http\Controllers\backend\AdminvendorprofileController;
use App\Http\Controllers\backend\AjaxController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ChildCategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\ProductImgGallery;
use App\Http\Controllers\backend\ProductVariantController;
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
// Product Img Gallery Route Curd
Route::resource('productImgGallery',ProductImgGallery::class);
// Product variant Route Curd
Route::get('productVariant/{id}',[ProductVariantController::class , 'productVariant'])->name('productVariant');
Route::post('productVariant/create/{id}',[ProductVariantController::class , 'productVariantCreate'])->name('productVariant.create');
Route::post('productVariant/update/{id}',[ProductVariantController::class , 'productVariantUpdate'])->name('productVariant.update');
Route::post('productVariant/delete/{id}',[ProductVariantController::class , 'productVariantDelete'])->name('productVariant.delete');
// ajax call route
Route::post('/get/category', [AjaxController::class, 'getSubCategory']);
Route::post('/get/subCategory', [AjaxController::class, 'getChildCategory']);
