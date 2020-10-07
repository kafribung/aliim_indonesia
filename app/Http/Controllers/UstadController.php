<?php

namespace App\Http\Controllers;

use App\Http\Requests\UstadAdminRequest;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\{Storage, Http, Hash};

class UstadController extends Controller
{
    //READ
    public function index()
    {
        $search = urlencode(request('search'));
        if ($search) $ustads = User::orderBy('id', 'DESC')->where('role', 2)->where('name', 'LIKE', '%'. $search .'%')->paginate(10);
        else $ustads = User::orderBy('id', 'DESC')->where('role', 2)->paginate(10);
        return view('dashboard.ustad', compact('ustads'));
    }

    //URL CREATE
    public function create()
    {
        // $provincis = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $provincis = $this->apiProvinsi();
        return view('dashboard_create.ustad_create', compact('provincis'));
    }

    //CREATE
    public function store(UstadAdminRequest $request)
    {
        // Batas Ustad
        if (User::where('role', 2)->count() >= 30) {
            return redirect('/ustad')->with('msg', 'Data Ustad Hanya Boleh 30');
        }
        $data = $request->except('password_confirmation');
        // Set Img
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
    public function edit(User $ustad)
    {
        $provincis = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $provincis->json();
        return view('dashboard_edit.ustad_edit', compact('ustad', 'provincis'));
    }

    // UPDATE
    public function update(UstadAdminRequest $request, User $ustad)
    {
        $data = $request->except(['password_confirmation']);
        // Set Img
        if ($request->has('img')) {
            // Dont Delete IMG Default
            if ($ustad->img != 'img_users/default_user.jpg') {
                Storage::delete($ustad->img);
            }
            $img = $request->file('img');
            $data['img'] = $request->file('img')->storeAs('img_users', time() . '.' . $img->getClientOriginalExtension());
        }
        $data['password'] = Hash::make($request->password);
        $ustad->update($data);
        return redirect('/ustad')->with('msg', 'Data Ustad Berhasil di Edit');
    }

    // DELETE
    public function destroy(User $ustad)
    {
        Storage::delete($ustad->img);
        $ustad->delete();
        return redirect('/ustad')->with('msg', 'Data Ustad Berhasil di Hapus');
    }

    // API PROVINSI
    public function apiProvinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: d54612ec18f6217de0657bbbd8c60b31"
        ),
        ));
        $provincis = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
        echo "cURL Error #:" . $err;
        }
        return  json_decode($provincis, true);
    }
}
