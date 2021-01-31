<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Models\{Artikel,  Hadist,};
use App\Http\Controllers\Controller;

class SearchArtikelController extends Controller
{
    public function __invoke(Request $request)
    {
        $serach = urldecode($request->input('cari'));
        // All Artikel
        $artikels = Artikel::with('user', 'kategori_artikels')->where('title', 'like', '%' . $serach . '%')->get();
        // Navigasi Kategori
        $kategori_artikels = NavbarKategori::navbarArtikel();

        // Sidebar (Artikel  Vidieo terbaru, iklan)
        $artikelsTerbaru = Sidebar::ArtikelTerbaru(); 
        $iklan_1         = Sidebar::Iklan();
        $iklan_2         = Sidebar::AllIklan();

        // Hadist Harian
        $hadist         =  Hadist::inRandomOrder()->first();

        return view('pages.artikel_search', 
        compact('artikels', 'kategori_artikels', 'artikelsTerbaru', 'iklan_1', 'iklan_2', 'hadist'));
    }
}
