<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ApiSingelArtikelController extends Controller
{
    public function update(Request $request, Artikel $artikel)
    {
        $data = $request->validate([
            "view" => ['required', 'integer']
        ]);
        $artikel->update($data);
        return response(['msg' => 'Data was succesfully updated'], 200);
    }
}
