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
            $img =  $request->file('img');
            $name= time(). '.'. $img->getClientOriginalExtension();
            $img->move( public_path('img_users'), $name);
            $data['img'] = $name;
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

        if ($request->has('img')) {
            $img =  $request->file('img');
            $name= time(). '.'. $img->getClientOriginalExtension();
            $img->move( public_path('img_users'), $name);
            $data['img'] = $name;
        }

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
