<?php

use App\Http\Controllers\backend\AdminContoller;
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