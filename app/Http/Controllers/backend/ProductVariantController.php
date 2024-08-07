<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    //productVariant
    public function productVariant($id){
        $product = Product::findOrFail($id);
        return view('admin.productVariant.index',compact('product'));
    }
}
