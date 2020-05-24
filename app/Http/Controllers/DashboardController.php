<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import yg Login
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.dashboard', compact('user'));
    }
}
