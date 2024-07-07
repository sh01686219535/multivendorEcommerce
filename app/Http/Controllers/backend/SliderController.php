<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class SliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::all();
        return view('admin.slider.index',compact('slider'));
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
            'title'=>'required'
        ]);
        $slider = new Slider();
        $sliderImage = $this->uploadImage($request,'image','sliderImg');
        $slider->text = $request->text;
        $slider->image = $sliderImage;
        $slider->title = $request->title;
        $slider->btnUrl = $request->btnUrl;
        $slider->description = $request->description;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();
        toastr()->success('Slider Created Successfully');
        return redirect()->back();
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
            'title'=>'required'
        ]);
        $slider = Slider::findOrFail($id);
        if ($request->hasFile('image')) {
            $sliderImage = $this->updadeImage($request,'image','sliderImg',$slider->image);
            $slider->image = $sliderImage;
        }
        $slider->text = $request->text;
        $slider->title = $request->title;
        $slider->btnUrl = $request->btnUrl;
        $slider->description = $request->description;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();
        toastr()->success('Slider Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        $this->delteItem($slider->image);
        $slider->delete();
        toastr()->success('Slider deleted Successfully');
        return redirect()->back();
    }
}
