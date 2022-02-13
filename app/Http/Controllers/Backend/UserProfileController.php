<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function veiwProfile()
    {
        $id = Auth::id();

        $user = User::find($id);
        return view('backend.Users.viewProfile', compact('user'));
    }

    public function edithProfile()
    {
        $id = Auth::id();

        $edith = User::find($id);
        return view('backend.Users.edithProfile', compact('edith'));
    }

    public function updateProfile(Request $request)
    {
        $update = User::find(Auth::user()->id);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->mobile = $request->mobile;
        $update->address = $request->address;
        $update->status = $request->status;

        if ($request->file('image')) {

            $file = $request->file('image');
            @unlink(public_path('uploads/user_images/' . $update->image));
            $file_name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/user_images'), $file_name);
            $update['image'] = $file_name;
        }
        $update->save();

        $notification = [
            'message' => 'User Profile Updatted successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('view.profile')->with($notification);
    }

    //change password method

    public function edithPassword()
    {
        return  view('Backend/Users/change_password');
    }


    public function updatePassword(Request $request)
    {
        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedpassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedpassword)) {

            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }
    }

    //end change password method
}