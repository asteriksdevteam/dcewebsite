<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // dd($_SERVER['REQUEST_URI'] == 'dashboard');
        return view('admin_panel.dashboard');
    }
}
