<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\{Hadist, DoaHadist, KategoriVideo};

class FilterVideoController extends Controller
{
    public function __invoke($kategori)
    {
        // Navigasi Kategori
        $kategori_artikels = NavbarKategori::navbarArtikel();
        $kategori_videos   = NavbarKategori::navbarVideo();

        // Filter Video Cara ke-2
        $kategori = KategoriVideo::with('videos')->where('title', $kategori)->first();
        $videos = $kategori->videos()->inrandomOrder()->paginate(5);
        // Doa & Hadist
        $motivasis =  DoaHadist::with('user')->inRandomOrder()->limit(4)->get();
        // Sidebar (Artikel  Vidieo terbaru, iklan)
        $artikelsTerbaru = Sidebar::ArtikelTerbaru(); 
        $videosTerbaru   = Sidebar::VedioTerbaru();
        $iklan_1         = Sidebar::Iklan();
        $iklan_2         = Sidebar::AllIklan();
        // Hadist Harian
        $hadist =  Hadist::inRandomOrder()->first();
        return view(
            'pages.video',
            compact('videos',  'motivasis', 'hadist', 'artikelsTerbaru', 'videosTerbaru', 'iklan_1', 'iklan_2', 'kategori_artikels', 'kategori_videos')
        );
    }
}
