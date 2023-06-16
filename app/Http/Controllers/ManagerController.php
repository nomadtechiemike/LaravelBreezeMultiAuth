<?php

namespace App\Http\Controllers;



class ManagerController extends Controller
{
    public function AdminDashboard()
    {

        return view('manager.index');
    }
}
