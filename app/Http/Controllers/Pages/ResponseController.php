<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'description' => 'required|min:5|max:1000'
        ]);
        $request->user()->responses()->create($data);
        return back()->with('msg', 'Tanggapan berhasil dikirim');
    }
}
