<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ApiSingelArtikelController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        dd($id);
        $artikel = Artikel::findOrFail($id);
        $data = $request->validate([
            "view" => ['required', 'integer']
        ]);
        $artikel->update($data);
        return response(['msg' => 'Data was succesfully updated'], 200);
    }
}
