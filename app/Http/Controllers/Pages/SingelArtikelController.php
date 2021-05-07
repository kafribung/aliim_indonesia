<?php

namespace App\Http\Controllers\Pages;

use App\Models\{Artikel, Hadist};
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class SingelArtikelController extends Controller
{
    public function __invoke(Artikel $artikel)
    {
        // SEO
        SEOMeta::setTitle($artikel->title);
        SEOMeta::setDescription(htmlspecialchars($artikel->description));
        SEOMeta::setCanonical( url()->current() );
        SEOMeta::addMeta('article:published_time', $artikel->created_at, 'property');
        // Looping array
        $keywords = [];
        foreach ($artikel->kategori_artikels as $kategori) {
            $keywords[] .= $kategori->title;
        }
        SEOMeta::addKeyword($keywords);

        // OG
        OpenGraph::setDescription($artikel->description);
        OpenGraph::setTitle($artikel->title);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addImage(['url' => asset('assets/img/logo.jpg'), 'size' => 300]);

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
