<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UstadAdminRequest;
use Illuminate\Support\Facades\{Storage, Hash};

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
        return abort('404');
    }

    //CREATE
    public function store(UstadAdminRequest $request)
    {
        return abort('404');
    }

    // SHOW
    public function show(User $admin)
    {
        return abort('404');
    }

    // EDIT
    public function edit(User $admin)
    {
        $provincis = ApiRajaOngkir::apiProvinsi();
        return view('dashboard_edit.admin_edit', compact('admin', 'provincis'));
    }

    // UPDATE
    public function update(UstadAdminRequest $request, User $admin)
    {
        $data =$request->except('password_confirmation');
        // Set Img
        if ($request->has('img')) {
            // Dont Delete IMG Default
            if ($admin->img != 'img_users/default_user.jpg') {
                Storage::delete($admin->img);
            }
            $img = $request->file('img');
            $data['img'] = $request->file('img')->storeAs('img_users', time() . '.' . $img->getClientOriginalExtension());
        }
        $data['password'] = Hash::make($request->password);
        $admin->update($data);
        return redirect('/admin')->with('msg', 'Data Admin Berhasil di Edit');
    }

    // DELETE
    public function destroy(User $admin)
    {
        return abort('404');
    }
}
