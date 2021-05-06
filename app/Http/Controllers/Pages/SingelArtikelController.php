<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\{Artikel, Hadist};
use Artesaos\SEOTools\Facades\SEOMeta;

class SingelArtikelController extends Controller
{
    public function __invoke(Artikel $artikel)
    {
        // SEO
        SEOMeta::setTitle($artikel->title);
        SEOMeta::setDescription(htmlspecialchars($artikel->description));
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addMeta('article:published_time', $post->published_date->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $post->category, 'property');
        SEOMeta::addKeyword(['key1', 'key2', 'key3']);
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
