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
        $iklan_1 = '';
        $iklan_2 = '';

        // Hadist Harian
        $hadist =  Hadist::inRandomOrder()->first();


        return view('pages.home', 
        compact('artikel_1' ,'artikel_2', 'artikel_3', 'artikel_4' ,'artikel_5', 'video_1', 'video_2', 'motivasis' , 'hadist')
        
        );
    }
}
