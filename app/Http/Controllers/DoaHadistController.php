<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import Class Request DoaHadist
use App\Http\Requests\DoaHadistRequest;
// Import Class STR
use Illuminate\Support\Str;
// Import Db DoaHadist
use App\Models\DoaHadist;

class DoaHadistController extends Controller
{
    // READ
    public function index()
    {
        $doas = DoaHadist::latest()->get();

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

        if ($request->has('img')) {
            $img = $request->file('img');
            $name= time() .'.'. $img->getClientOriginalExtension();
            $img->move(public_path('img_doa_hadists'), $name);

            $data['img'] = $name;
        }

        $data['slug'] = Str::slug($request->title);

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

        if ($request->has('img')) {
            $img = $request->file('img');
            $name= time() .'.'. $img->getClientOriginalExtension();
            $img->move(public_path('img_doa_hadists'), $name);

            $data['img'] = $name;
        }

        $data['slug'] = Str::slug($request->title);

        DoaHadist::findOrFail($id)->update($data);

        return redirect('/doa-hadist')->with('msg', 'Data Doa & Hadist Berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        DoaHadist::destroy($id);

        return redirect('/doa-hadist')->with('msg', 'Data Doa & Hadist Berhasil dihapus');
    }
}
