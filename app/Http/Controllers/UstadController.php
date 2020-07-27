<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import User Request
use App\Http\Requests\UstadAdminRequest;
// Import Class Hash
use Illuminate\Support\Facades\Hash;
// Import Class Str
use Illuminate\Support\Str;
// Import DB User
use App\Models\User;
// Import Class HTTP
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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
        $provincis = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $provincis->json();

        return view('dashboard_create.ustad_create', compact('provincis'));
    }

    //CREATE
    public function store(UstadAdminRequest $request)
    {
        // Batas Ustad
        if (User::where('role', 2)->count() >= 5) {
            return redirect('/ustad')->with('msg', 'Data Ustad Hanya Boleh 5');
        }
        $data = $request->all();

        if ($request->has('img')) {
            $img = $request->file('img');
            $data['img'] = $request->file('img')->storeAs('img_users', time() . '.' . $img->getClientOriginalExtension());
        }

        $data['password'] = Hash::make($request->password);
        $data['status']   = 1;
        $data['role']     = 2;
        $data['token']    = Str::random(30);

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
        $provincis = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $provincis->json();

        return view('dashboard_edit.ustad_edit', compact('ustad', 'provincis'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'img'      => ['required', 'mimes:png,jpg,jpeg'],
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = User::findOrFail($id);

        if ($request->has('img')) {
            Storage::delete($user->img);
            $img = $request->file('img');
            $data['img'] = $request->file('img')->storeAs('img_users', time() . '.' . $img->getClientOriginalExtension());
        }

        $data['password'] = Hash::make($request->password);

        $user->update($data);

        return redirect('/ustad')->with('msg', 'Data Ustad Berhasil di Edit');
    }

    // DELETE
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        Storage::delete($user->img);
        User::destroy($id);

        return redirect('/ustad')->with('msg', 'Data Ustad Berhasil di Hapus');
    }
}
