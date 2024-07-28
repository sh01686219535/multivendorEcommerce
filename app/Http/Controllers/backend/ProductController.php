<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        $banner = Banner::all();
        $product = Product::all();
        return view('admin.product.index', compact('category', 'banner', 'product'));
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
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'subCategory_id' => 'required',
            'childCategory_id' => 'required',
        ]);
        $product = new Product();
        $productImg = $this->uploadImage($request, 'thumb_image', 'productImg');
        if ($request->hasFile('thumb_image')) {
            $product->thumb_image = $productImg;
        }
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category_id;
        $product->subCategory_id = $request->subCategory_id;
        $product->childCategory_id = $request->childCategory_id;
        $product->banner_id = $request->banner_id;
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->productType = $request->productType;
        $product->status = $request->status;
        $product->seo_title = $request->seo_title;
        $product->is_approved = 1;
        $product->seo_description = $request->seo_description;
        $product->save();
        toastr()->success('Product Create Successfully');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $productImg = $this->updadeImage($request, 'thumb_image', 'productImg', $product->thumb_image);
        if ($request->hasFile('thumb_image')) {
            if (File::exists(public_path($product->thumb_imag))) {
                File::delete(public_path($product->thumb_imag));
            }
            $product->thumb_image = $productImg;
        }
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category_id;
        $product->subCategory_id = $request->subCategory_id;
        $product->childCategory_id = $request->childCategory_id;
        $product->banner_id = $request->banner_id;
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->productType = $request->productType;
        $product->status = $request->status;
        $product->seo_title = $request->seo_title;
        $product->is_approved = 1;
        $product->seo_description = $request->seo_description;
        $product->save();
        toastr()->success('Product Update Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->thumb_image && File::exists(public_path($product->thumb_image))) {
            File::delete(public_path($product->thumb_image));
        }
        $product->delete();
        toastr()->success('Product deleted Successfully');
        return back();
    }
}
