<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class ManagerController extends Controller
{
    public function ManagerDashboard()
    {
        return view('manager.index');
    }

    public function ManagerProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find();
        return view('manager.profile_view', compact('profileData'));
    }

    public function ManagerProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if (! empty($request->file('photo'))) {
            $file = $request->file('photo');
            @unlink(public_path('upload/avatar/'.$data->photo));
            $ext = $request->file('photo')->getClientOriginalExtension();
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/avatar'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notify = [
            'message' => 'Manager Profile Updated',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notify);
    }
}
