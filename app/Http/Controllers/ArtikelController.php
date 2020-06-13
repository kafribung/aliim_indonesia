<?php

namespace App\Http\Controllers;

// Import Class Request Artikel
use App\Http\Requests\ArtikelRequest;
// Import Class STR
use Illuminate\Support\Str;

// Import Model Artikel
use App\Models\Artikel;
// Import Model KategoriArtikel
use App\Models\KategoriArtikel;

class ArtikelController extends Controller
{
    // READ
    public function index()
    {
        $artikels = Artikel::with('kategori_artikels')->orderBy('id', 'desc')->get();

        return view('dashboard.artikel', compact('artikels'));
    }

    // CREAT
    public function create()
    {
        $kategoris = KategoriArtikel::orderBy('id', 'desc')->get(); 

        return view('dashboard_create.artikel_create', compact('kategoris'));
    }

    //
    public function store(ArtikelRequest $request)
    {
        // Store Img
        if ($request->has('img')) {
            $img = $request->file('img');
            $name= time().'.'.$img->getClientOriginalExtension();
            $img->move(public_path('img_artikels'), $name);

            $data_img = $name;
        }

            $data_slug = Str::slug($request->title);

        // Eloquent Store Data 
        $artikel = $request->user()->artikels()->create([
            'title'      => $request->title,
            'img'        => $data_img,
            'description'=> $request->description,
            'slug'       => $data_slug,
        ]);

        // Store Kategori
        $kategoris = $request->kategori;
        $artikel->kategori_artikels()->attach($kategoris);

        return redirect('/artikel')->with('msg', 'Data Artikel Berhasil ditambahkan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($slug)
    {
        $artikel   =  Artikel::where('slug', $slug)->first();
        $kategoris = KategoriArtikel::orderBy('id', 'desc')->get(); 

        return view('dashboard_edit.artikel_edit', compact('artikel', 'kategoris'));
    }

    // UPDATE
    public function update(ArtikelRequest $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        $data = $request->all();

         // Store Img
        if ($request->has('img')) {
            $img = $request->file('img');
            $name= time() . '.'. $img->getClientOriginalExtension();
            $img->move(public_path('img_artikels'), $name);

            $data_img = $name;
        }
            $data_slug = Str::slug($request->title);

        // Eloquent Update Data 
        Artikel::findOrFail($id)->update([
            'title'      => $request->title,
            'img'        => $data_img,
            'description'=> $request->description,
            'slug'       => $data_slug,
        ]);

        // Store Kategori
        $kategoris = $request->kategori;
        $artikel->kategori_artikels()->sync($kategoris);

        return redirect('/artikel')->with('msg', 'Data Artikel Berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        Artikel::destroy($id);

        return redirect('/artikel')->with('msg', 'Data Artikel Berhasil dihapus');
    }
}
