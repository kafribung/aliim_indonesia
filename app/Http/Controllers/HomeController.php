<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import Model Artikel
use App\Models\Artikel;

// Import Model Video
use App\Models\Video;

// Import Model Hadist
use App\Models\Hadist;

// Import Model Hadist
use App\Models\DoaHadist;

// Import Model Iklan
use App\Models\Iklan;

// Import Model KategoriArtikel
use App\Models\KategoriArtikel;

// Import Model KategoriVideo
use App\Models\KategoriVideo;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Hero
        $artikel_1 = Artikel::with('user', 'kategori_artikels')->latest()->first();
        $artikel_2 = Artikel::with('user', 'kategori_artikels')->where('view', '>=', 20)->paginate(2);

        // Singl Artikel
        $artikel_3 = Artikel::with('user', 'kategori_artikels')->orderBy('id', 'asc')->first();

        // All Artikel
        $artikel_4 = Artikel::with('user','kategori_artikels')->inRandomOrder()->paginate(4);

        // Artikel terbaru
        $artikel_5 = Artikel::with('user','kategori_artikels')->orderBy('id', 'desc')->paginate(3);

        // Video
        $video_1 = Video::with('user', 'kategori_videos')->paginate(4);

        // Vidieo terbaru
        $video_2 = Video::with('user', 'kategori_videos')->latest()->paginate(4);

        // Doa & Hadist
        $motivasis =  DoaHadist::with('user')->inRandomOrder()->paginate(3);

        // Iklan
        $iklan_1 = Iklan::latest()->first();
        $iklan_2 = Iklan::inRandomOrder()->paginate(2);

        // Hadist Harian
        $hadist =  Hadist::inRandomOrder()->first();

        // Navigasi
        $kategori_artikels = KategoriArtikel::with('artikels')->get(); 
        $kategori_videos   = KategoriVideo::with('videos')->get(); 


        return view('pages.home', 
        compact('artikel_1' ,'artikel_2', 'artikel_3', 'artikel_4' ,'artikel_5', 'video_1', 'video_2', 'motivasis' , 'hadist', 'iklan_1', 'iklan_2' , 'kategori_artikels', 'kategori_videos')
        );
    }

    // SHOW ARTIKEL
    public function show_artikel($slug)
    {
        $artikel = Artikel::with('user', 'kategori_artikels')->where('slug', $slug)->first();
        $hadist  =  Hadist::inRandomOrder()->first();

        // Artikel terbaru
        $artikel_5 = Artikel::with('user','kategori_artikels')->orderBy('id', 'desc')->paginate(3);

        // Vidieo terbaru
        $video_2 = Video::with('user', 'kategori_videos')->latest()->paginate(4);

        // Iklan
        $iklan_1 = Iklan::latest()->first();
        $iklan_2 = Iklan::inRandomOrder()->paginate(2);

        // Navigasi
        $kategori_artikels = KategoriArtikel::with('artikels')->get(); 
        $kategori_videos   = KategoriVideo::with('videos')->get(); 


        return view('pages.single', compact('artikel', 'hadist' ,'artikel_5', 'iklan_1', 'iklan_2', 'video_2', 'kategori_artikels', 'kategori_videos'));
    }

    // SHOW VIDEO
    public function show_video($slug)
    {
        $video = Video::with('user', 'kategori_videos')->where('slug', $slug)->first();
        $hadist  =  Hadist::inRandomOrder()->first();

        // Artikel terbaru
        $artikel_5 = Artikel::with('user','kategori_artikels')->orderBy('id', 'desc')->paginate(3);

        // Vidieo terbaru
        $video_2 = Video::with('user', 'kategori_videos')->latest()->paginate(4);

        // Iklan
        $iklan_1 = Iklan::latest()->first();
        $iklan_2 = Iklan::inRandomOrder()->paginate(2);

        // Navigasi
        $kategori_artikels = KategoriArtikel::with('artikels')->get(); 
        $kategori_videos   = KategoriVideo::with('videos')->get(); 
  

        return view('pages.single_video', compact('video', 'hadist' ,'artikel_5', 'iklan_1', 'iklan_2', 'video_2', 'kategori_artikels', 'kategori_videos'));
    }

    // Filter Artikel
    public function filter_artikel($kategori) 
    {
        $artikels = Artikel::with('user', 'kategori_artikels')->whereHas('kategori_artikels', function($query) use($kategori) {
            $query->where('title', $kategori);
        })->get();

        dd($artikels);
    } 
}
