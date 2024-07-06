<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class VendorContoller extends Controller
{
    //vendorDashboard
    public function vendorDashboard(){
        return view('vendor.dashboard');
    }
    // vendorProfile
    public function vendorProfile(){
        return view('vendor.profile.profile');
    }
    // profileUpdate
    public function profileUpdate(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required'
        ]);
        $user = Auth::user();
        if ($request->hasFile('image')) {
            $request->validate([
                'image'=>'required'
            ]);
            $fileName = time().'-'.$request->image->getClientOriginalName();
            $filePath = $request->image->storeAs('vendorImage',$fileName);
            File::delete(public_path($user->image));
            $user->image = 'storage/'.$filePath;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        toastr()->success('Vendor Profile Update Successfully');
        return back();
    }
    // passwordUpdate
    public function passwordUpdate(Request $request){
        $request->validate([
            'currentPassword'=>'required',
            'password'=>'required',
            'passwordConfirm'=>'required|same:password'
        ]);
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        toastr()->success('Vendor password Update Successfully');
        return back();
    }

}
