<?php

namespace App\Http\Controllers;

// Import Class Request
use App\Http\Requests\HadistRequest;

// Import DB Hadist
use App\Models\Hadist;

// 

class HadistController extends Controller
{
    //
    public function index()
    {
        $hadists =  Hadist::latest()->get();

        return view('dashboard.hadist', compact('hadists'));
    }

    // CREATE
    public function create()
    {
        return view('dashboard_create.hadist_create');
    }

    // STORE
    public function store(HadistRequest $request)
    {
        $data = $request->all();

        Hadist::create($data);

        return redirect('/hadist')->with('msg', 'Data Hadist Berhasil di Tambahkan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($id)
    {
        $hadist =  Hadist::findOrFail($id);

        return view('dashboard_edit.hadist_edit', compact('hadist'));
    }

    // UPDATE
    public function update(HadistRequest $request, $id)
    {
        $data = $request->all();

        Hadist::findOrFail($id)->update($data);

        return redirect('/hadist')->with('msg', 'Data Hadist Berhasil di Update');
    }
    // DELETE
    public function destroy($id)
    {
        Hadist::destroy($id);

        return redirect('/hadist')->with('msg', 'Data Hadist Berhasil di Hapus');

    }

}
