<?php

namespace App\Http\Controllers\Pages;

use App\Models\{Hadist, Galeri};
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use App\Http\Controllers\Pages\{NavbarKategori,  Sidebar};

class MotivasiController extends Controller
{
    public function __invoke()
    {
        // SEO
        SEOMeta::setCanonical( url()->current() );
        // OG
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addImage(['url' => asset('assets/img/logo.jpg'), 'size' => 300]);
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
