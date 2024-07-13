<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategory = SubCategory::all();
        $category = Category::all();
        $childCategory = ChildCategory::with('category','subCategory')->get();
        return view('admin.childCategory.index',compact('subCategory','category','childCategory'));
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
            'category_id'=>'required',
            'subCategory_id'=>'required',
        ]);
        $category = new ChildCategory();
        $category->category_id = $request->category_id;
        $category->subCategory_id = $request->subCategory_id;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();
        toastr()->success('Child Category Create Successfully');
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
            'category_id'=>'required',
            'subCategory_id'=>'required',
        ]);
        $category = ChildCategory::find($id);
        $category->category_id = $request->category_id;
        $category->subCategory_id = $request->subCategory_id;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();
        toastr()->success('Child Category Update Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = ChildCategory::find($id);
        $category->delete();
        toastr()->success('Child Category Deleted Successfully');
        return back();
    }
}
