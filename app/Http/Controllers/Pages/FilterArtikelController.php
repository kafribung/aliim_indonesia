<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\{Artikel, Hadist, KategoriArtikel};

class FilterArtikelController extends Controller
{
    public function __invoke($kategori)
    {
        // Navigasi Kategori
        $kategori_artikels = NavbarKategori::navbarArtikel();
        // Filter Artikel Cara ke-1
        $artikels = Artikel::with('user', 'kategori_artikels')->whereHas('kategori_artikels', function ($artikel) use ($kategori) {
            $artikel->where('title', $kategori);
        })->inRandomOrder()->paginate(5);

        // FIlter Artikel Cara ke-2
        // $artikels = KategoriArtikel::with('artikels')->with('title', $kategori);

        // Sidebar (Artikel  Vidieo terbaru, iklan)
        $artikelsTerbaru = Sidebar::ArtikelTerbaru(); 
        $iklan_1         = Sidebar::Iklan();
        $iklan_2         = Sidebar::AllIklan();
        // Hadist Harian
        $hadist         =  Hadist::inRandomOrder()->first();
        return view(
            'pages.artikel',
            compact('artikels', 'hadist', 'artikelsTerbaru', 'iklan_1', 'iklan_2', 'kategori_artikels')
        );
    }
}
