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


class AdminController extends Controller
{
    //READ
    public function index()
    {
        $admins = User::orderBy('id', 'DESC')->where('role', 1)->get();
        return view('dashboard.admin', compact('admins'));
    }

    //URL CREATE
    public function create()
    {
        return view('dashboard_create.admin_create');
    }

    //CREATE
    public function store(UserRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($request->password);
        $data['status']   = 1;
        $data['role']     = 1;
        $data['token']    = Str::random(30);

        // Batas Ustad
        if (User::where('role', 1)->count() >= 4) {
            return redirect('/admin')->with('msg', 'Data Admin Hanya Boleh 4');
        }

        User::create($data);

        return redirect('/admin')->with('msg', 'Data Ustad Berhasil di Tambah');
    }

    // SHOW
    public function show($id)
    {
        return abort('404'); 
    }

    // EDIT
    public function edit($id)
    {
        $admin = User::findOrFail($id);

        return view('dashboard_edit.admin_edit', compact('admin'));
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

        return redirect('/admin')->with('msg', 'Data Admin Berhasil di Edit');
    }

    // DELETE
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/admin')->with('msg', 'Data Admin Berhasil di Hapus');
    }
}
