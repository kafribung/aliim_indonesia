<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function index()
    {
        $responses = Response::with('user')->get();
        return view('dashboard.response', ['responses' => $responses]);
    }

    public function destroy(Response $response)
    {
        $response->delete();
        return redirect('/response')->with('msg', 'Data tanggapan '. $response->user->name . ' berhasil dihapus');
    }
}
