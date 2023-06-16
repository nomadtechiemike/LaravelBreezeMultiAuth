<?php

namespace App\Http\Controllers;



class UserController extends Controller
{
    public function AdminDashboard()
    {

        return view('user.index');
    }
}
