<?php

namespace App\Http\Controllers;

// Import Class Request DoaHadist
use App\Http\Requests\DoaHadistRequest;
// Import Class STR
use Illuminate\Support\Str;
// Import Db DoaHadist
use App\Models\DoaHadist;
use Illuminate\Support\Facades\Storage;

class DoaHadistController extends Controller
{
    // READ
    public function index()
    {
        $search = urlencode(request('search'));
        if ($search) $doaHadists = DoaHadist::with('user')->latest()->where('title', 'LIKE', '%'. $search . '%')->paginate(12);
        else $doaHadists = DoaHadist::with('user')->latest()->paginate(12);
        return view('dashboard.doa_hadist', compact('doaHadists'));
    }

    // CREATE
    public function create()
    {
        return view('dashboard_create.doa_hadist_create');
    }

    // STORE
    public function store(DoaHadistRequest $request)
    {
        $data = $request->all();
        // Store Img
        if ($img = $request->file('img')) {
            $data['img'] = $request->file('img')->storeAs('img_doa_hadists', time() . '.' . $img->getClientOriginalExtension());
        }
        $data['slug'] = Str::slug($request->title);
        // Eloquent Store DoaHadist
        $request->user()->doa_hadists()->create($data);
        return redirect('/doa-hadist')->with('msg', 'Data Doa & Hadist Berhasil ditambahkan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit(DoaHadist $doaHadist)
    {
        $this->authorize('author', $doaHadist);
        return view('dashboard_edit.doa_hadist_edit', compact('doaHadist'));
    }

    // UPDATE
    public function update(DoaHadistRequest $request, DoaHadist $doaHadist)
    {
        $data = $request->all();
        // Store Img
        if ($img = $request->file('img')) {
            if ($doaHadist->img != 'img_doa_hadists/default_doa.jpg') {
                Storage::delete($doaHadist->img);
            }
            $data['img'] = $request->file('img')->storeAs('img_doa_hadists', time() . '.' . $img->getClientOriginalExtension());
        }
        $data['slug'] = Str::slug($request->title);
        $doaHadist->update($data);
        return redirect('/doa-hadist')->with('msg', 'Data Doa & Hadist Berhasil diupdate');
    }

    // DELETE
    public function destroy(DoaHadist $doaHadist)
    {
        if ($doaHadist->img != 'img_doa_hadists/default_doa.jpg') {
            Storage::delete($doaHadist->img);
        }
        $doaHadist->delete();
        return redirect('/doa-hadist')->with('msg', 'Data Doa & Hadist Berhasil dihapus');
    }
}
