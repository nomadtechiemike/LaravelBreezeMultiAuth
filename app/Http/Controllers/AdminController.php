<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    }

    // public function AdminChat()
    // {
    //     return view('admin.admin_chat');
    // }
    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.profile_view', compact('profileData'));
    }

    public function AdminChangePassword()
    {
        dd('Inside AdminChangePassword()');
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.change_password', ['profileData' => $profileData]);

    }

    public function AdminUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',

            'new_password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->mixedCase()->symbols()],

        ]);

        if (! Hash::check($request->old_password, auth::user()->password)) {
            $notify = [
                'message' => 'Old password does not match!',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notify);
        }
       
        User::whereId(auth()->user()->id)->update([       
            'password' => Hash::make($request->new_password),
        ]);
        $notify = [
            'message' => 'Password successfully update!',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notify);
    }

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if (! empty($request->file('photo'))) {
            $file = $request->file('photo');
            @unlink(public_path('upload/avatar/'.$data->photo));
            $ext = $request->file('photo')->getClientOriginalExtension();
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/avatar'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notify = [
            'message' => 'Admin Profile Updated',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notify);
    }
}
