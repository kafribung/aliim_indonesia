<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\{Artikel, Hadist};

class FilterArtikelController extends Controller
{
    public function __invoke($kategori)
    {
        // Navigasi Kategori
        $kategori_artikels = NavbarKategori::navbarArtikel();
        $kategori_videos   = NavbarKategori::navbarVideo();
        // Filter Artikel Cara ke-1
        $artikels = Artikel::with('user', 'kategori_artikels')->whereHas('kategori_artikels', function ($artikel) use ($kategori) {
            $artikel->where('title', $kategori);
        })->inRandomOrder()->paginate(5);
        // Sidebar (Artikel  Vidieo terbaru, iklan)
        $artikelsTerbaru = Sidebar::ArtikelTerbaru(); 
        $videosTerbaru   = Sidebar::VedioTerbaru();
        $iklan_1         = Sidebar::Iklan();
        $iklan_2         = Sidebar::AllIklan();
        // Hadist Harian
        $hadist         =  Hadist::inRandomOrder()->first();
        return view(
            'pages.artikel',
            compact('artikels', 'hadist', 'artikelsTerbaru', 'videosTerbaru', 'iklan_1', 'iklan_2', 'kategori_artikels', 'kategori_videos')
        );
    }
}
