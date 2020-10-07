<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\VideoRequest;
use App\Models\{Video, KategoriVideo};

class VideoController extends Controller
{
    // READ
    public function index()
    {
        $search = urlencode(request('search'));
        if ($search) $videos = Video::with('kategori_videos', 'user')->orderBy('id', 'desc')->where('title', 'LIKE', '%'. $search .'%')->paginate(12);
        else $videos = Video::with('kategori_videos', 'user')->orderBy('id', 'desc')->paginate(12);
        return view('dashboard.video', compact('videos'));
    }

    // CREATE
    public function create()
    {
        $kategoris = KategoriVideo::latest()->get();
        return view('dashboard_create.video_create', compact('kategoris'));
    }

    // STORE
    public function store(VideoRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        // Eloquet Store Video
        $video = $request->user()->videos()->create($data);
        // Store Data Kategori(Mani to Many)
        $video->kategori_videos()->attach($request->kategori);
        return redirect('/video')->with('msg', 'Data Video Berhasil ditambahkan ');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($slug)
    {
        $video =  Video::where('slug', $slug)->first();
        $kategoris = KategoriVideo::latest()->get();
        // Cek Author
        $this->authorize('edit', $video);
        return view('dashboard_edit.video_edit', compact('video', 'kategoris'));
    }

    // UPDATE
    public function update(VideoRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $video = Video::findOrFail($id);
        // Cek Author
        $this->authorize('edit', $video);
        // Eloquet Update Video
        $video->update($data);
        // Store Data Kategori(Mani to Many)
        $video->kategori_videos()->sync($request->kategori);
        return redirect('/video')->with('msg', 'Data Video Berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        // Cek Author
        $this->authorize('edit', $video);
        Video::destroy($id);
        return redirect('/video')->with('msg', 'Data Video Berhasil dihapus');
    }
}
