<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\{Artikel, Hadist, DoaHadist};

class FilterArtikelController extends Controller
{
    public function __invoke($kategori)
    {
        // Navigasi Kategori
        $kategori_artikels = NavbarKategori::navbarArtikel();
        $kategori_videos   = NavbarKategori::navbarVideo();
        // Filter Video Cara ke-1
        $artikels = Artikel::with('user', 'kategori_artikels')->whereHas('kategori_artikels', function ($query) use ($kategori) {
            $query->where('title', $kategori);
        })->inRandomOrder()->paginate(5);
        // Doa & Hadist
        $motivasis =  DoaHadist::with('user')->inRandomOrder()->limit(4)->get();
        // Sidebar (Artikel  Vidieo terbaru, iklan)
        $artikelsTerbaru = Sidebar::ArtikelTerbaru(); 
        $videosTerbaru   = Sidebar::VedioTerbaru();
        $iklan_1         = Sidebar::Iklan();
        $iklan_2         = Sidebar::AllIklan();
        // Hadist Harian
        $hadist         =  Hadist::inRandomOrder()->first();
        return view(
            'pages.artikel',
            compact('artikels',  'motivasis', 'hadist', 'artikelsTerbaru', 'videosTerbaru', 'iklan_1', 'iklan_2', 'kategori_artikels', 'kategori_videos')
        );
    }
}
