<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

// Import User Request
use App\Http\Requests\UserRequest;

// Import Class Hash
use Illuminate\Support\Facades\Hash;

// Import Class Str
use Illuminate\Support\Str;

// Import DB User
use App\Models\User;


class UstadController extends Controller
{
    //READ
    public function index()
    {
        $ustads = User::orderBy('id', 'DESC')->where('role', 2)->get();
        return view('dashboard.ustad', compact('ustads'));
    }

    //URL CREATE
    public function create()
    {
        return view('dashboard_create.ustad_create');
    }

    //CREATE
    public function store(UserRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($request->password);
        $data['status']   = 1;
        $data['role']     = 2;
        $data['token']    = Str::random(30);

        // Batas Ustad
        if (User::where('role', 2)->count() >= 10) {
            return redirect('/ustad')->with('msg', 'Data Ustad Hanya Boleh 5');
        }

        User::create($data);

        return redirect('/ustad')->with('msg', 'Data Ustad Berhasil di Tambah');
    }

    // SHOW
    public function show($id)
    {
        return abort('404'); 
    }

    // EDIT
    public function edit($id)
    {
        $ustad = User::findOrFail($id);

        return view('dashboard_edit.ustad_edit', compact('ustad'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6']
        ]);

        $data['password'] = Hash::make($request->password);

        User::findOrFail($id)->update($data);

        return redirect('/ustad')->with('msg', 'Data Ustad Berhasil di Edit');
    }

    // DELETE
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/ustad')->with('msg', 'Data Ustad Berhasil di Hapus');
    }
}
