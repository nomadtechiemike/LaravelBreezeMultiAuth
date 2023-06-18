<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UserDashboard()
    {
        return view('user.index');
    }
    public function UserProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('user.profile_view', compact('profileData'));
    }


    public function UserProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if (!empty($request->file('photo'))) {
            $file = $request->file('photo');
            @unlink(public_path('upload/avatar/' . $data->photo));
            $ext = $request->file('photo')->getClientOriginalExtension();
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move(public_path('upload/avatar'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notify = array(
            'message' => 'User Profile Updated',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notify);
    }
}
