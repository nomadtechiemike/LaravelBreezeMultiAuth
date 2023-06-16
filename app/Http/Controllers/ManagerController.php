<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function AdminDashboard()
    {

        return view('manager.index');
    }
}
