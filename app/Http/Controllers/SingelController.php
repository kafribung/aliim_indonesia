<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Artikel, Hadist, Video, Iklan, KategoriArtikel, KategoriVideo};

class SingelController extends Controller
{
    public function show_artikel(Artikel $artikel)
    {
        // Hadist terbaru
        $hadist  =  Hadist::inRandomOrder()->first();
        // Artikel terbaru
        $artikel_5 = Artikel::with('user', 'kategori_artikels')->orderBy('id', 'desc')->limit(4)->get();

        // Vidieo terbaru
        $video_2 = Video::with('user', 'kategori_videos')->latest()->limit(4)->get();

        // Iklan
        $iklan_1 = Iklan::latest()->inRandomOrder()->first();
        // Navigasi
        $kategori_artikels = KategoriArtikel::with('artikels')->get();
        $kategori_videos   = KategoriVideo::with('videos')->get();

        return view('pages.single_artikel', compact('artikel', 'hadist', 'artikel_5', 'video_2', 'iklan_1',  'kategori_artikels', 'kategori_videos'));
    }

    public function show_video(Video $video)
    {
        // Hadist terbaru
        $hadist  =  Hadist::inRandomOrder()->first();
        // Artikel terbaru
        $artikel_5 = Artikel::with('user', 'kategori_artikels')->orderBy('id', 'desc')->limit(4)->get();

        // Vidieo terbaru
        $video_2 = Video::with('user', 'kategori_videos')->latest()->limit(4)->get();

        // Iklan
        $iklan_1 = Iklan::latest()->inRandomOrder()->first();
        // Navigasi
        $kategori_artikels = KategoriArtikel::with('artikels')->get();
        $kategori_videos   = KategoriVideo::with('videos')->get();

        return view('pages.single_video', compact('video', 'hadist', 'artikel_5', 'video_2', 'iklan_1',  'kategori_artikels', 'kategori_videos'));
    }
}