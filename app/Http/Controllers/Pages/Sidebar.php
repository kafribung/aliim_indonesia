<?php

namespace App\Http\Controllers\Pages;

use App\Models\{Artikel, Video, Iklan};

class Sidebar {
    public static function ArtikelTerbaru()
    {
        return Artikel::with('user', 'kategori_artikels')->latest()->limit(3)->get();   
    }

    public static function VedioTerbaru()
    {
        return Video::with('user', 'kategori_videos')->latest()->limit(3)->get();
    }

    public static function Iklan()
    {
        return Iklan::latest()->inRandomOrder()->first();
    }

    public static function AllIklan()
    {
        return Iklan::inRandomOrder()->limit(2)->get();
    }
}