<?php

use App\Http\Controllers\backend\AdminContoller;
use App\Http\Controllers\backend\ProfileContoller;
use App\Http\Controllers\backend\VendorContoller;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\frontend\UserProfileContoller;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;


// Frontend Route
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/shopDetails', [FrontendController::class, 'shopDetails'])->name('shopDetails');
Route::get('/shopingCart', [FrontendController::class, 'shopingCart'])->name('shopingCart');
Route::get('/checkOut', [FrontendController::class, 'checkOut'])->name('checkOut');
Route::get('/blogDetails', [FrontendController::class, 'blogDetails'])->name('blogDetails');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
// admin login route
Route::get('admin/login', [AdminContoller::class, 'adminLogin'])->name('admin.login');
// User Route
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    // userProfile 
    Route::get('/user/profile', [UserProfileContoller::class, 'userProfile'])->name('user.profile');
    Route::post('/user/profile', [UserProfileContoller::class, 'profileStore'])->name('user.profile');
    Route::post('/user/password/update', [UserProfileContoller::class, 'passwordUpdate'])->name('user.password.update');
    
});
