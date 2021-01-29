<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\{Hadist, Galeri};
use App\Http\Controllers\Pages\{NavbarKategori,  Sidebar};

class MotivasiController extends Controller
{
    public function __invoke()
    {
        // Navigasi Kategori
        $kategori_artikels = NavbarKategori::navbarArtikel();
        // Galeri
        $galeris           =  Galeri::with('user')->inRandomOrder()->limit(12)->get();
        // Sidebar (Artikel  Vidieo terbaru, iklan)
        $artikelsTerbaru   = Sidebar::ArtikelTerbaru(); 
        $iklan_1           = Sidebar::Iklan();
        $iklan_2           = Sidebar::AllIklan();
        // Hadist Harian
        $hadist            =  Hadist::inRandomOrder()->first();
        return view('pages.motivasi', 
        compact('galeris', 'hadist', 'artikelsTerbaru', 'iklan_1', 'iklan_2', 'kategori_artikels')
    );
    }
}
