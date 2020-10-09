<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $hadist  =  Hadist::inRandomOrder()->first();

        // Navigasi
        $kategori_artikels = KategoriArtikel::with('artikels')->get();
        $kategori_videos   = KategoriVideo::with('videos')->get();

        return view('pages.profile', compact('user', 'hadist', 'kategori_artikels', 'kategori_videos'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'min:3', 'max:20'],
            'img'      => ['mimes:png,jpg,jpeg']
        ]);

        if ($request->has('img')) {
            $img =  $request->file('img');
            $name = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('img_users'), $name);
            $data['img'] = $name;
        }

        User::findOrFail($id)->update($data);

        return redirect('/profile')->with('msg', 'Data Berhasil di Edit');
    }
}
