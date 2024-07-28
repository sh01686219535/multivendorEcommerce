<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DB;

class AjaxController extends Controller
{
    // getSubCategory
    public function getSubCategory(Request $request)
    {
        $category_id = $request->post('category_id');
        $subCategory = DB::table('sub_categories')->where('category_id', $category_id)->get();
        return response()->json($subCategory);
    }
    // getChildCategory
    public function getChildCategory(Request $request)
    {
       $subCategory_id = $request->subCategory_id;
       $childCategory = ChildCategory::where('subCategory_id',$subCategory_id)->get();
       return response()->json($childCategory,200);
    }
}
