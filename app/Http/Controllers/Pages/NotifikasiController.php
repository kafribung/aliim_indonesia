<?php

namespace App\Http\Controllers\Pages;

use App\Models\{Artikel, Hadist, Notification};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    // READ
    public function index()
    {
        // Notif
        $notifications =  Notification::with('user', 'artikel')->where('user_id', Auth::user()->id)->get();
        // Navigasi Kategori
        $kategori_artikels = NavbarKategori::navbarArtikel();
        // Hadist Harian
        $hadist         =  Hadist::inRandomOrder()->first();
        return view('pages.notifikasi', compact('notifications' , 'kategori_artikels', 'hadist'));
    }
}
