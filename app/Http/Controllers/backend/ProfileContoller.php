<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ProfileContoller extends Controller
{
    //adminProfile
    public function adminProfile(){
        return view('admin.profile.profile');
    }
    //profileUpdate
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
            $filePath = $request->image->storeAs('adminImage',$fileName);
            File::delete(public_path($user->image));
            $user->image = 'storage/'.$filePath;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        toastr()->success('User Profile Update Successfully');
        return back();
    }
    //passwordUpdate
    public function passwordUpdate(Request $request){
        $request->validate([
            'currentPassword'=>'required',
            'password'=>'required',
            'passwordConfirm'=>'required|same:password'
        ]);
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        toastr()->success('User password Update Successfully');
        return back();
    }
}
