<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\ArtikelRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\{Artikel, KategoriArtikel};

class ArtikelController extends Controller
{
    // READ
    public function index()
    {
        $search = urlencode(request('search'));
        if ($search) $artikels = Artikel::with('kategori_artikels', 'user')->orderBy('id', 'desc')->where('title', 'LIKE', '%'. $search .'%')->paginate(12);
        else $artikels = Artikel::with('kategori_artikels', 'user')->orderBy('id', 'desc')->paginate(12);
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
    public function edit(Artikel $artikel)
    {
        $kategoris = KategoriArtikel::orderBy('id', 'desc')->get();
        // Cek Author
        $this->authorize('edit', $artikel);
        return view('dashboard_edit.artikel_edit', compact('artikel', 'kategoris'));
    }

    // UPDATE
    public function update(ArtikelRequest $request, Artikel $artikel)
    {
        // Cek Author
        $this->authorize('edit', $artikel);
        $data = $request->all();
        // Store Img
        if ($img = $request->file('img')) {
            if ($artikel->img != 'img_artikels/default_artikel.jpg') {
                Storage::delete($artikel->img);
            }
            $data['img'] = $request->file('img')->storeAs('img_artikels', time() . '.' . $img->getClientOriginalExtension());
        }
        $data['slug']= Str::slug($request->title);
        // Eloquent Update Data 
        $artikel->update($data);
        // Store Kategori
        $artikel->kategori_artikels()->sync($request->kategori);
        return redirect('/artikel')->with('msg', 'Data Artikel Berhasil diupdate');
    }

    // DELETE
    public function destroy(Artikel $artikel)
    {
        // Cek Author
        $this->authorize('edit', $artikel);
        if ($artikel->img != 'img_artikels/default_artikel.jpg') {
            Storage::delete($artikel->img);
        }
        $artikel->delete();
        return redirect('/artikel')->with('msg', 'Data Artikel Berhasil dihapus');
    }
}
