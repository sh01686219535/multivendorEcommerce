<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //home
    public function home(){
        return view('frontend.home.home');
    } 
    // shop
    public function shop(){
        return view('frontend.shop.shop');
    } 
    // shopDetails
    public function shopDetails(){
        return view('frontend.page.shopDetails');
    } 
    // shopingCart
    public function shopingCart(){
        return view('frontend.page.shopingCart');
    } 
    // checkOut
    public function checkOut(){
        return view('frontend.page.checkOut');
    } 
    // blogDetails
    public function blogDetails(){
        return view('frontend.page.blogDetails');
    } 
    // blog
    public function blog(){
        return view('frontend.page.blog');
    } 
    // contact
    public function contact(){
        return view('frontend.page.contact');
    } 
}
