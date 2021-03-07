<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Artikel, Galeri, Hadist};


class ResponseController extends Controller
{
    public function __invoke(Request $request)
    {
        // Navigasi Kategori
        $kategori_artikels = NavbarKategori::navbarArtikel();
        // Hero
        $heroFirst     = Artikel::with('user', 'kategori_artikels')->latest()->first();
        $heroTwo       = Artikel::with('user', 'kategori_artikels')->where('view', '>=', 20)->limit(2)->get();
        // Singl Artikel
        $artikel       = Artikel::with('user', 'kategori_artikels')->inRandomOrder()->first();
        // All Artikel
        $artikels      = Artikel::with('user', 'kategori_artikels')->inRandomOrder()->limit(4)->get();
        // Doa & Hadist
        $galeris       = Galeri::with('user')->inRandomOrder()->limit(4)->get();
        // Sidebar (Artikel  Vidieo terbaru, iklan)
        $artikelsTerbaru = Sidebar::ArtikelTerbaru(); 
        $iklan_1         = Sidebar::Iklan();
        $iklan_2         = Sidebar::AllIklan();
        // Hadist Harian
        $hadist          =  Hadist::inRandomOrder()->first();

        $data = $request->validate([
            'description' => 'required|min:5|max:1000'
        ]);

        $request->user()->responses()->create($data);
        return back()->with('msg', 'Tanggapan berhasil dikirim');
    }
}
