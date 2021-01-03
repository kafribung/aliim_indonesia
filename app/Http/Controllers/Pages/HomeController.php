<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\{Artikel, Video, Hadist, DoaHadist};

class HomeController extends Controller
{
    public function __invoke()
    {
        // Navigasi Kategori
        $kategori_artikels = NavbarKategori::navbarArtikel();
        $kategori_videos   = NavbarKategori::navbarVideo();
        // Hero
        $heroFirst     = Artikel::with('user', 'kategori_artikels')->latest()->first();
        $heroTwo       = Artikel::with('user', 'kategori_artikels')->where('view', '>=', 20)->limit(2)->get();
        // Singl Artikel
        $artikel       = Artikel::with('user', 'kategori_artikels')->inRandomOrder()->first();
        // All Artikel
        $artikels      = Artikel::with('user', 'kategori_artikels')->inRandomOrder()->limit(4)->get();
        // Video
        $videos        = Video::with('user', 'kategori_videos')->inRandomOrder()->limit(4)->get();
        // Doa & Hadist
        $motivasis     = DoaHadist::with('user')->inRandomOrder()->limit(4)->get();
        // Sidebar (Artikel  Vidieo terbaru, iklan)
        $artikelsTerbaru = Sidebar::ArtikelTerbaru(); 
        $videosTerbaru   = Sidebar::VedioTerbaru();
        $iklan_1         = Sidebar::Iklan();
        $iklan_2         = Sidebar::AllIklan();
        // Hadist Harian
        $hadist         =  Hadist::inRandomOrder()->first();
        return view(
            'pages.home',
            compact('heroFirst', 'heroTwo', 'artikel', 'artikels', 'artikelsTerbaru', 'videos', 'videosTerbaru', 'motivasis', 'hadist', 'iklan_1', 'iklan_2', 'kategori_artikels', 'kategori_videos')
        );
    }
}
