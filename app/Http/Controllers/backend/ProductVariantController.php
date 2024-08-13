<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    //productVariant
    public function productVariant($id){
        $product = Product::findOrFail($id);
        $productVariant = ProductVariant::all();
        return view('admin.productVariant.index',compact('product','productVariant'));
    }
    //productVariantCreate
    public function productVariantCreate(Request $request,$id){
        $product = Product::findOrFail($id);
        $productVariant = new ProductVariant();
        $productVariant->name = $request->name;
        $productVariant->status = $request->status;
        $productVariant->product_id = $product->id;
        $productVariant->save();
        return back()->with('message','Product Variant Create Successfully');
    }
    //productVariantUpdate
    public function productVariantUpdate(Request $request,$id){
        $product = Product::findOrFail($request->product_id);
        $productVariant = ProductVariant::findOrFail($id);
        $productVariant->name = $request->name;
        $productVariant->status = $request->status;
        $productVariant->product_id = $product->id;
        $productVariant->save();
        return back()->with('message','Product Variant Update Successfully');
    }
    //productVariantDelete
    public function productVariantDelete(Request $request,$id){
        $productVariant = ProductVariant::findOrFail($id);
        $productVariant->delete();
        return back()->with('message','Product Variant Deleted Successfully');
    }
}
