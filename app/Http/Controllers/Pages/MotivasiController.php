<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\{Hadist, DoaHadist};

class MotivasiController extends Controller
{
    public function index()
    {
        // Navigasi Kategori
        $kategori_artikels = NavbarKategori::navbarArtikel();
        $kategori_videos   = NavbarKategori::navbarVideo();
        // Doa & Hadist
        $motivasis       =  DoaHadist::with('user')->inRandomOrder()->get();
        // Sidebar (Artikel  Vidieo terbaru, iklan)
        $artikelsTerbaru = Sidebar::ArtikelTerbaru(); 
        $videosTerbaru   = Sidebar::VedioTerbaru();
        $iklan_1         = Sidebar::Iklan();
        $iklan_2         = Sidebar::AllIklan();
        // Hadist Harian
        $hadist          =  Hadist::inRandomOrder()->first();
        return view('pages.motivasi', 
        compact('motivasis',  'motivasis', 'hadist', 'artikelsTerbaru', 'videosTerbaru', 'iklan_1', 'iklan_2', 'kategori_artikels', 'kategori_videos')
    );
    }
}
