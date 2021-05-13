<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UstadAdminRequest;
use Illuminate\Support\Facades\{Storage, Hash};

class UserController extends Controller
{
    //READ
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->where('role', 0)->get();
        return view('dashboard.user', compact('users'));
    }

    //URL CREATE
    public function create()
    {
        return view('dashboard_create.user_create');
    }

    //CREATE
    public function store()
    {
        return abort('404');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit(User $user)
    {
        return view('dashboard_edit.user_edit', compact('user'));
    }

    // UPDATE
    public function update(UstadAdminRequest $request, User $user)
    {
        $data = $request->validated();
        if ($request->has('img')) {
            // Dont Delete IMG Default
            if ($user->img != 'img_users/default_user.jpg') {
                Storage::delete($user->img);
            }
            $img = $request->file('img');
            $data['img'] = $request->file('img')->storeAs('img_users', time() . '.' . $img->getClientOriginalExtension());
        }
        $data['password'] = Hash::make($request->password);
        $user->update($data);
        return redirect('/user')->with('msg', 'Data User Berhasil di Edit');
    }

    // DELETE
    public function destroy(User $user)
    {
        // Dont Delete IMG Default
        if ($user->img != 'img_users/default_user.jpg') {
            Storage::delete($user->img);
        }
        $user->delete();
        return redirect('/user')->with('msg', 'Data User Berhasil di Hapus');
    }
}
