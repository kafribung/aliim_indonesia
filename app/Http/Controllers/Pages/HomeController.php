<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Artikel, Video, Hadist, DoaHadist,  Iklan, User};

use Auth;

class HomeController extends Controller
{
    public function index()
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

    // Search Artikel
    public function search_artikel(Request $request)
    {
        $serach = urldecode($request->input('search'));

        $artikels = Artikel::with('user', 'kategori_artikels')->where('title', 'like', '%' . $serach . '%')->get();

        $hadist  =  Hadist::inRandomOrder()->first();

        // Artikel terbaru
        $artikel_5 = Artikel::with('user', 'kategori_artikels')->orderBy('id', 'desc')->paginate(3);

        // Vidieo terbaru
        $video_2 = Video::with('user', 'kategori_videos')->latest()->paginate(4);

        // Iklan
        $iklan_1 = Iklan::latest()->first();
        $iklan_2 = Iklan::inRandomOrder()->paginate(2);

        // Navigasi
        $kategori_artikels = KategoriArtikel::with('artikels')->get();
        $kategori_videos   = KategoriVideo::with('videos')->get();

        return view('pages.artikel_search', compact('artikels', 'hadist', 'artikel_5', 'iklan_1', 'iklan_2', 'video_2', 'kategori_artikels', 'kategori_videos'));
    }
}
