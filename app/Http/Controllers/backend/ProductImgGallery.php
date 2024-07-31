<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImgGallery as ModelsProductImgGallery;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use File;

class ProductImgGallery extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     $product = Product::findOrFail($request->productId);
     $productImg = ModelsProductImgGallery::all();
     return view('admin.productImg.index',compact('product','productImg'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imgPth = $this->multipleImgUpload($request,'image','upload');
        foreach ($imgPth as $value) {
           $img = new ModelsProductImgGallery();
           $img->image = $value;
           $img->product_id = $request->product;
           $img->save();
        }
        toastr()->success('Product Img Update Successfully');
        return back();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $img = ModelsProductImgGallery::findOrFail($id);
        if (File::exists(public_path($img->image))) {
            File::delete(public_path($img->image));
        }
        $img->delete();
        toastr()->success('Product Img Update Successfully');
        return back();
    }
}
