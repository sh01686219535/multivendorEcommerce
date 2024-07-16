<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //getSubCategor
    public function getSubCategor(Request $request){
        $id = $request->id;
        $subCategory = SubCategory::where('category_id',$id)->get();
        return response()->json($subCategory,200);
    }
}
