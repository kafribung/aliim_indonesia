<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserUstadAdminRequest;
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
    public function store()
    {
        return abort('404');
    }

    // SHOW
    public function show()
    {
        return abort('404');
    }

    // EDIT
    public function edit(User $admin)
    {
        return view('dashboard_edit.admin_edit', compact('admin'));
    }

    // UPDATE
    public function update(UserUstadAdminRequest $request, User $admin)
    {
        $data =$request->validated();
        // Set Img
        if ($request->hasFile('img')) {
            // Dont Delete IMG Default
            if ($admin->img != 'img_users/default_user.jpg') {
                Storage::delete($admin->img);
            }
            $img = $request->img;
            $data['img'] = $img->storeAs('img_users', time() . '.' . $img->getClientOriginalExtension());
        }
        $data['password'] = Hash::make($request->password);
        $admin->update($data);
        return redirect('/admin')->with('msg', 'Data Admin Berhasil di Edit');
    }
}
