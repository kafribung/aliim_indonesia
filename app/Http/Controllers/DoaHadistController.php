<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $doas = DoaHadist::with('user')->latest()->get();
        return view('dashboard.doa_hadist', compact('doas'));
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
    public function edit($slug)
    {
        $doa = DoaHadist::where('slug', $slug)->first();
        return view('dashboard_edit.doa_hadist_edit', compact('doa'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'img'   => ['mimes:png,jpg,jpeg'],
        ]);
        $doa = DoaHadist::findOrFail($id);
        // Store Img
        if ($img = $request->file('img')) {
            if ($doa->img != 'img_doa_hadists/default_doa.jpg') {
                Storage::delete($doa->img);
            }
            $data['img'] = $request->file('img')->storeAs('img_doa_hadists', time() . '.' . $img->getClientOriginalExtension());
        }
        $data['slug'] = Str::slug($request->title);
        $doa->update($data);
        return redirect('/doa-hadist')->with('msg', 'Data Doa & Hadist Berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        $doa = DoaHadist::findOrFail($id);
        if ($doa->img != 'img_doa_hadists/default_doa.jpg') {
            Storage::delete($doa->img);
        }
        DoaHadist::destroy($id);
        return redirect('/doa-hadist')->with('msg', 'Data Doa & Hadist Berhasil dihapus');
    }
}
