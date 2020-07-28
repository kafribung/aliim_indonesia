<?php

namespace App\Http\Controllers;
// Import Class Request Artikel
use Illuminate\Support\Str;
// Import Class STR
use App\Http\Requests\ArtikelRequest;
// Import Model Artikel & KategoriArtikel
use Illuminate\Support\Facades\Storage;
use App\Models\{Artikel, KategoriArtikel};

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

    // STORE
    public function store(ArtikelRequest $request)
    {
        $data = $request->all();
        // Store Img
        if ($img = $request->file('img')) {
            $data['img'] = $request->file('img')->storeAs('img_artikels', time() . '.' . $img->getClientOriginalExtension());
        }
        $data['slug'] = Str::slug($request->title);
        // Eloquent Store Artikel 
        $artikel = $request->user()->artikels()->create($data);
        // Store Kategori Many to Many
        $artikel->kategori_artikels()->attach($request->kategori);
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
        $artikel   = Artikel::where('slug', $slug)->first();
        $kategoris = KategoriArtikel::orderBy('id', 'desc')->get();
        return view('dashboard_edit.artikel_edit', compact('artikel', 'kategoris'));
    }

    // UPDATE
    public function update(ArtikelRequest $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        $data = $request->all();
        // Store Img
        if ($img = $request->file('img')) {
            Storage::delete($artikel->img);
            $data['img'] = $request->file('img')->storeAs('img_artikels', time() . '.' . $img->getClientOriginalExtension());
        }
        $data_slug = Str::slug($request->title);
        // Eloquent Update Data 
        $artikel->findOrFail($id)->update($data);
        // Store Kategori
        $artikel->kategori_artikels()->sync($request->kategori);
        return redirect('/artikel')->with('msg', 'Data Artikel Berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        Storage::delete($artikel->img);
        Artikel::destroy($id);
        return redirect('/artikel')->with('msg', 'Data Artikel Berhasil dihapus');
    }
}
