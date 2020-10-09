<?php
namespace App\Http\Controllers\Pages;

use App\Models\{KategoriArtikel, KategoriVideo};

class NavbarKategori {
    public static function navbarArtikel()
    {
        return KategoriArtikel::with('artikels')->get();
    }

    public static function navbarVideo()
    {
        return KategoriVideo::with('videos')->get();
    }
}
