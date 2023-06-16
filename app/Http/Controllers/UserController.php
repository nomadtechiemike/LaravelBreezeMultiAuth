<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function AdminDashboard()
    {

        return view('user.index');
    }
}
