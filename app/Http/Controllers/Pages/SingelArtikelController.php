<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\{Artikel, Hadist, Video, Iklan, KategoriArtikel, KategoriVideo};

class SingelArtikelController extends Controller
{
    public function __invoke(Artikel $artikel)
    {
        // Navigasi Kategori
        $kategori_artikels = NavbarKategori::navbarArtikel();
        // Sidebar (Artikel  Vidieo terbaru, iklan)
        $artikelsTerbaru = Sidebar::ArtikelTerbaru(); 
        $iklan_1         = Sidebar::Iklan();
        $iklan_2         = Sidebar::AllIklan();
        // Hadist terbaru
        $hadist  =  Hadist::inRandomOrder()->first();
        return view('pages.single_artikel', 
            compact('artikel', 'hadist', 'artikelsTerbaru', 'iklan_1', 'iklan_2', 'kategori_artikels')
        );
    }
}
