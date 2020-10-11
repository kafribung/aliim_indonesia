<?php

namespace App\Http\Controllers\Pages;

use Auth;
use App\Models\User;
use App\Models\Hadist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        // Navigasi Kategori
        $kategori_artikels = NavbarKategori::navbarArtikel();
        $kategori_videos   = NavbarKategori::navbarVideo();
        $user     = Auth::user();
        $hadist  =  Hadist::inRandomOrder()->first();
        return view('pages.profile', compact('user', 'hadist', 'kategori_artikels', 'kategori_videos'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'min:3', 'max:20'],
            'img'      => ['required','mimes:jpg,jpeg'],
            'old_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8'],
        ]);
        $oldPass = request('old_password');
        $newPass = auth()->user()->password;
        
        if (Hash::check($oldPass, $newPass)) {
            // Update Img
            if ($img =  $request->file('img')) {
                // Dont Delete IMG Default
                if (Auth::user()->img != 'img_users/default_user.jpg') {
                    Storage::delete(auth()->user()->img);
                }
                $data['img'] = $request->file('img')->storeAs('img_users', time() . '.' . $img->getClientOriginalExtension());
            }
            User::findOrFail($id)->update([
                'name' => $data['name'],
                'img'  => $data['img'],
                'password' => bcrypt($data['new_password'])
            ]);
            Auth::logout();
            return redirect('/login')->with('msg', 'Silahkan login terlebih dahulu');
        } else return back()->withErrors(['old_password' => 'Password lama salah']);
    }
}
