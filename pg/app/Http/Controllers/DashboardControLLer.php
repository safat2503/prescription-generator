<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardControLLer extends Controller
{
    public function index(){
        return view('dashboard');
    }
}
