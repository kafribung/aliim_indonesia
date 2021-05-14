<?php

namespace App\Http\Controllers;

use App\Http\Requests\IklanRequest;
use App\Models\Iklan;
use Illuminate\Support\Facades\Storage;

class IklanController extends Controller
{
    // READ
    public function index()
    {
        $iklans = Iklan::latest()->get();
        return view('dashboard.iklan', compact('iklans'));
    }

    // CREATE
    public function create()
    {
        return view('dashboard_create.iklan_create');
    }

    // STORE
    public function store(IklanRequest $request)
    {
        $data = $request->validated();
        if ($img = $request->file('img')) {
            $data['img'] = $img->storeAs('img_iklans', time() . '.' . $img->getClientOriginalExtension());
        }
        Iklan::create($data);
        return redirect('/iklan')->with('msg', 'Data Iklan Berhasil di Tambahkan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($id)
    {
        $iklan = Iklan::findOrFail($id);
        return view('dashboard_edit.iklan_edit', compact('iklan'));
    }

    // UPDATE
    public function update(IklanRequest $request, $id)
    {
        $data = $request->all();
        $iklan = Iklan::findOrFail($id);
        if ($img = $request->file('img')) {
            if ($iklan->img != 'img_iklans/default_iklan.jpg') {
                Storage::delete($iklan->img);
            }
            $data['img'] = $img->storeAs('img_iklans', time() . '.' . $img->getClientOriginalExtension());
        }
        $iklan->update($data);
        return redirect('/iklan')->with('msg', 'Data Iklan Berhasil di Edit');
    }

    // DELETE
    public function destroy($id)
    {
        $iklan = Iklan::findOrFail($id);
        if ($iklan->img != 'img_iklans/default_iklan.jpg') {
            Storage::delete($iklan->img);
        }
        $iklan->delete();
        return redirect('/iklan')->with('msg', 'Data Iklan Berhasil di Hapus');
    }
}
