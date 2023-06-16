<?php

namespace App\Http\Controllers;



class ManagerController extends Controller
{
    public function ManagerDashboard()
    {

        return view('manager.index');
    }
}
