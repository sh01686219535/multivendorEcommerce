<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use App\Traits\ImageUploadTrait;

class BannerController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $banner = Banner::all();
        return view('admin.banner.index',compact('banner'));
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
            'name'=>'required',
            'is_Featured'=>'required'
        ]);
        $banner = new Banner();
        if ($request->hasFile('image')) {
            $bannerImg = $this->uploadImage($request,'image','bannerImg');
            $banner->image = $bannerImg;
        }
        $banner->name = $request->name;
        $banner->slug = Str::slug($request->name);
        $banner->is_Featured = $request->is_Featured;
        $banner->status = $request->status;
        $banner->save();
        toastr()->success('Banner Create Successfully');
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
        $request->validate([
            'name'=>'required',
            'is_Featured'=>'required'
        ]);
        $banner = Banner::find($id);
        if ($request->hasFile('image')) {
            $bannerImg = $this->updadeImage($request,'image','bannerImg');
            $banner->image = $bannerImg;
        }
        $banner->name = $request->name;
        $banner->slug = Str::slug($request->name);
        $banner->is_Featured = $request->is_Featured;
        $banner->status = $request->status;
        $banner->save();
        toastr()->success('Banner Update Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        if (File::exists(public_path($banner->image))) {
            File::delete(public_path($banner->image));
        }
        $banner->delete();
        toastr()->success('Banner Update Successfully');
        return back();
    }
}
