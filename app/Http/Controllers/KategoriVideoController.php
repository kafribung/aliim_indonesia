<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import Db KategoriVideo
use App\Models\KategoriVideo;

class KategoriVideoController extends Controller
{
    // READ
    public function index()
    {
        $kategoris = KategoriVideo::latest()->get();

        return view('dashboard.kategori_video', compact('kategoris'));
    }

    // CREATE
    public function create()
    {
        return view('dashboard_create.kategori_video_create');
    }

    // STORE
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' =>  ['required', 'string', 'min:3', 'max:255', 'unique:kategori_videos']
        ]);

        KategoriVideo::create($data);

        return redirect('/kategori-video')->with('msg','Data Kategori Berhasil ditambahakan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($id)
    {
        $kategori = KategoriVideo::findOrFail($id);

        return view('dashboard_edit.kategori_video_edit', compact('kategori'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255']
        ]);

        KategoriVideo::findOrFail($id)->update($data);

        return redirect('/kategori-video')->with('msg', 'Data Kategori Berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        KategoriVideo::destroy($id);

        return redirect('/kategori-video')->with('msg','Data Kategori Berhasil dihapus');
    }
}
