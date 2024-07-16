<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminvendorprofileController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendor = Vendor::where('user_id',Auth::user()->id)->first();
        return view('admin.vendor.index',compact('vendor'));
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
        $vendor = Vendor::where('user_id',Auth::user()->id)->first();
        $vendor->user_id = Auth::user()->id;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->address = $request->address;
        $vendor->facebook = $request->facebook;
        $vendor->twitter = $request->twitter;
        $vendor->instragram = $request->instragram;
        $vendor->description = $request->description;
        $vendor->image = $request->image;
        if ($request->hasFile('image')) {
            $vemdorImg = $this->updadeImage($request, 'image', 'vendorImg');
            $vendor->image = $vemdorImg;
        }
        $vendor->save();
        toastr()->success('Vendor Create Successfully');
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
        //
    }
}
