<?php
namespace App\Http\Controllers\Pages;

use App\Models\{KategoriArtikel};

class NavbarKategori {
    public static function navbarArtikel()
    {
        return KategoriArtikel::with('artikels')->get();
    }
}
