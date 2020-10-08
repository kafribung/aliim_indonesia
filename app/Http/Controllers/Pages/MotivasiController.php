<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Artikel, Video, Hadist, DoaHadist,  Iklan, KategoriArtikel, KategoriVideo};

class MotivasiController extends Controller
{
    public function index()
    {
        // Doa & Hadist
        $motivasis =  DoaHadist::with('user')->inRandomOrder()->get();
        // Artikel terbaru
        $artikel_5 = Artikel::with('user', 'kategori_artikels')->orderBy('id', 'desc')->limit(4)->get();
        // Video
        $video_1 = Video::with('user', 'kategori_videos')->inRandomOrder()->limit(4)->get();
        // Vidieo terbaru
        $video_2 = Video::with('user', 'kategori_videos')->latest()->limit(4)->get();
        // Doa & Hadist
        $motivasis =  DoaHadist::with('user')->inRandomOrder()->limit(4)->get();
        // Iklan
        $iklan_1 = Iklan::latest()->first();
        $iklan_2 = Iklan::inRandomOrder()->limit(2)->get();
        // Hadist Harian
        $hadist =  Hadist::inRandomOrder()->first();
        // Navigasi
        $kategori_artikels = KategoriArtikel::with('artikels')->get();
        $kategori_videos = KategoriVideo::with('videos')->get();
        return view('pages.motivasi', compact('motivasis', 'hadist', 'artikel_5', 'iklan_1', 'iklan_2', 'video_2', 'kategori_artikels', 'kategori_videos'));
    }
}
