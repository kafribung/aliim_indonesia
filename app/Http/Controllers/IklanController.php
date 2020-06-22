<?php

namespace App\Http\Controllers;

// Import Class IklanRequest
use App\Http\Requests\IklanRequest;

// Import DB Iklan
use App\Models\Iklan;

// Import Class File
use Illuminate\Support\Facades\File;

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
        $data = $request->all();

        if ($request->has('img')) {
            $img = $request->file('img');
            $name= time().'.'. $img->getClientOriginalExtension();
            $img->move(public_path('img_iklans'), $name);

            $data['img'] = $name;
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

        if ($request->has('img')) {
            $img = $request->file('img');
            $name= time().'.'. $img->getClientOriginalExtension();
            $img->move(public_path('img_iklans'), $name);

            $data['img'] = $name;
        }

        Iklan::findOrFail($id)->update($data);

        return redirect('/iklan')->with('msg', 'Data Iklan Berhasil di Edit');
    }

    // DELETE
    public function destroy($id)
    {
        $img = Iklan::findOrFail($id);

        $name = unlink($img->img);

        File::delete(public_path('img_iklans'), $name);

        return redirect('/iklan')->with('msg', 'Data Iklan Berhasil di Hapus');
    }
}
