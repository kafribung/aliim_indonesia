<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriArtikelRequest;
// Import Class DB Kategoti Artikel
use App\Models\KategoriArtikel;

class KategoriArtikelController extends Controller
{
    // READ
    public function index()
    {
        $kategoris = KategoriArtikel::orderBy('id', 'desc')->get();
        return view('dashboard.kategori_artikel', compact('kategoris'));
    }

    // CREATE
    public function create()
    {
        return view('dashboard_create.kategori_artikel_create');
    }

    // STORE
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255', 'unique:kategori_artikels', new LowercaseRule], 
        ]);
        KategoriArtikel::create($data);
        return redirect('/kategori-artikel')->with('msg', 'Data Kategori Berhasil ditambahkan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($id)
    {
        $kategori = KategoriArtikel::findOrFail($id);
        return view('dashboard_edit.kategori_artikel_edit', compact('kategori'));
    }

    /// UPDATE
    public function update(KategoriArtikelRequest $request, $id)
    {
        $data = $request->validated();
        KategoriArtikel::findOrFail($id)->update($data);
        return redirect('/kategori-artikel')->with('msg', 'Data Kategori Berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        KategoriArtikel::destroy($id);
        return redirect('/kategori-artikel')->with('msg', 'Data Kategori Berhasil dihapus');
    }
}
