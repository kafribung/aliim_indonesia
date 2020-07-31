<?php

namespace App\Http\Controllers;

use App\Models\{Artikel, Video, Hadist, DoaHadist,  Iklan, KategoriArtikel, KategoriVideo, User};
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter_artikel($kategori)
    {
        $artikels = Artikel::with('user', 'kategori_artikels')->whereHas('kategori_artikels', function ($query) use ($kategori) {
            $query->where('title', $kategori);
        })->inRandomOrder()->get();

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
        return view(
            'pages.artikel',
            compact('artikels', 'artikel_5', 'video_1', 'video_2', 'motivasis', 'hadist', 'iklan_1', 'iklan_2', 'kategori_artikels', 'kategori_videos')
        );
    }

    public function filter_video($kategori)
    {
        $videos = Video::with('user', 'kategori_videos')->whereHas('kategori_videos', function ($query) use ($kategori) {
            $query->where('title', $kategori);
        })->inRandomOrder()->get();

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
        return view(
            'pages.video',
            compact('videos', 'artikel_5', 'video_1', 'video_2', 'motivasis', 'hadist', 'iklan_1', 'iklan_2', 'kategori_artikels', 'kategori_videos')
        );
    }
}
