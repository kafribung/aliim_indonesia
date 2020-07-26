<?php

namespace App\Http\Controllers;

use App\Models\{User, Artikel, DoaHadist, Video};
use Illuminate\Http\Request;

// Import yg Login
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user  = User::where('role', 0)->count();
        $ustad = User::where('role', 2)->count();
        $admin = User::where('role', 1)->count();
        $article = Artikel::count();
        $video   = Video::count();
        $doa     = DoaHadist::count();
        return view('dashboard.dashboard', compact('user', 'ustad', 'admin', 'article', 'video', 'doa'));
    }
}
