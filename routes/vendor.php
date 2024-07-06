<?php

use App\Http\Controllers\backend\VendorContoller;
use Illuminate\Support\Facades\Route;

// Vendor Route
Route::get('dashboard',[VendorContoller::class,'vendorDashboard'])->name('dashboard');
Route::get('profile',[VendorContoller::class,'vendorProfile'])->name('profile');
Route::post('profile',[VendorContoller::class,'profileUpdate'])->name('profile');
Route::post('password/update',[VendorContoller::class,'passwordUpdate'])->name('password.update');
