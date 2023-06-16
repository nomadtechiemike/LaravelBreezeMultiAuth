<?php

namespace App\Http\Controllers;



class AdminController extends Controller
{
    public function AdminDashboard()
    {

        return view('admin.index');
    }
}
