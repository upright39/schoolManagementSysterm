<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userVeiw()
    {
        $data['users'] = User::where('usertype', 'Admin')->get();

        return view('backend.Users.view_user', $data);
    }


    public function addUser()
    {
        return view('backend.Users.add_user');
    }

    public function storeUser(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $store = new User();
        $code = rand(0000, 9999);
        $store->usertype = 'Admin';
        $store->role = $request->role;
        $store->name = $request->name;
        $store->email = $request->email;
        $store->password = bcrypt($code);
        $store->code = $code;
        $store->save();

        $notification = [
            'message' => 'User summited successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('view_users')->with($notification);
    }

    public function edithUser($id)
    {
        $user = User::find($id);
        return view('backend.Users.edith', compact('user'));
    }


    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $notification = [
            'message' => 'User edited successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('view_users')->with($notification);
    }


    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        $notification = [
            'message' => 'User Deleted successfully',
            'alert-type' => 'error'
        ];

        return redirect()->route('view_users')->with($notification);
    }
}