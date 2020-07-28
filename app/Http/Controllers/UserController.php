<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\{Storage, Hash, Http};

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
    public function store(UserRequest $request)
    {
        return abort('404');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $provincis = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $provincis->json();
        return view('dashboard_edit.user_edit', compact('user', 'provincis'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6']
        ]);
        $user = User::findOrFail($id);
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
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        Storage::delete($user->img);
        User::destroy($id);
        return redirect('/user')->with('msg', 'Data User Berhasil di Hapus');
    }
}
