<?php

namespace App\Http\Controllers;

use App\Models\{User, Artikel, Galeri};

class DashboardController extends Controller
{
    public function index()
    {
        $user       = User::where('role', 0)->count();
        $ustad      = User::where('role', 2)->count();
        $admin      = User::where('role', 1)->count();
        $article    = Artikel::count();
        $galeri     = Galeri::count();
        return view('dashboard.dashboard', compact('user', 'ustad', 'admin', 'article', 'galeri'));
    }
}
