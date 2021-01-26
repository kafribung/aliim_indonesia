<?php

namespace App\Http\Controllers;

// Import Class Request DoaHadist
use App\Http\Requests\GaleriRequest;
// Import Class STR
use Illuminate\Support\Str;
// Import Db DoaHadist
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // READ
    public function index()
    {
        $search = urlencode(request('search'));
        if ($search) $galeris = Galeri::with('user')->latest()->where('title', 'LIKE', '%'. $search . '%')->paginate(12);
        else $galeris = Galeri::with('user')->latest()->paginate(12);
        return view('dashboard.galeri', compact('galeris'));
    }

    // CREATE
    public function create()
    {
        return view('dashboard_create.galeri_create');
    }

    // STORE
    public function store(GaleriRequest $request)
    {
        $data = $request->all();
        // Store Img
        if ($img = $request->file('img')) {
            $data['img'] = $request->file('img')->storeAs('img_galeris', time() . '.' . $img->getClientOriginalExtension());
        }
        $data['slug'] = Str::slug($request->title);
        // Eloquent Store DoaHadist
        $request->user()->doa_hadists()->create($data);
        return redirect('/galeri')->with('msg', 'Galeri Berhasil ditambahkan');
    }

    // SHOW
    public function show()
    {
        return abort('404');
    }

    // EDIT
    public function edit(Galeri $galeri)
    {
        $this->authorize('author', $galeri);
        return view('dashboard_edit.galeri_edit', compact('galeri'));
    }

    // UPDATE
    public function update(GaleriRequest $request, Galeri $galeri)
    {
        $data = $request->all();
        // Store Img
        if ($img = $request->file('img')) {
            if ($galeri->img != 'img_galeris/default_doa.jpg') {
                Storage::delete($galeri->img);
            }
            $data['img'] = $request->file('img')->storeAs('img_galeris', time() . '.' . $img->getClientOriginalExtension());
        }
        $data['slug'] = Str::slug($request->title);
        $galeri->update($data);
        return redirect('/galeri')->with('msg', 'Galeri Berhasil diupdate');
    }

    // DELETE
    public function destroy(Galeri $galeri)
    {
        if ($galeri->img != 'img_galeris/default_doa.jpg') {
            Storage::delete($galeri->img);
        }
        $galeri->delete();
        return redirect('/galeri')->with('msg', 'Galeri Berhasil dihapus');
    }
}
