<?php

namespace App\Http\Controllers;

use App\Models\KomentArtikel;
use Illuminate\Http\Request;

class KomentArtikelController extends Controller
{
    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'description' => ['required', 'string', 'max:200']
        ]);
        $data['artikel_id'] = $id;

        $request->user()->komentars()->create($data);

        return redirect()->back();
    }
}
