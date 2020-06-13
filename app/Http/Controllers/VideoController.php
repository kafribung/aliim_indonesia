<?php

namespace App\Http\Controllers;

// Import Class Request
use App\Http\Requests\VideoRequest;
// Import Class STR
use Illuminate\Support\Str;
// Import DB Video
use App\Models\Video;
// Import DB KategoriVideo
use App\Models\KategoriVideo;


class VideoController extends Controller
{
    // READ
    public function index()
    {
        $videos = Video::with('kategori_videos')->orderBy('id', 'desc')->get();

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
        $data_slug = Str::slug($request->title);

        $video = $request->user()->videos()->create([
            'title' => $request->title,
            'video' => $request->video,
            'description' => $request->description,
            'slug'        => $data_slug,
        ]);

        // Store Data Kategori(Mani to Many)
        $kategoris = $request->kategori;

        $video->kategori_videos()->attach($kategoris);

        return redirect('/video')->with('msg', 'Data Video Berhasil ditambahkan ');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    //
    public function edit($slug)
    {
        $video =  Video::where('slug', $slug)->first();
        $kategoris = KategoriVideo::latest()->get();

        return view('dashboard_edit.video_edit', compact('video', 'kategoris'));
    }

    // UPDATE
    public function update(VideoRequest $request, $id)
    {
        $data_slug = Str::slug($request->title);

        Video::findOrFail($id)->update([
            'title' => $request->title,
            'video' => $request->video,
            'description' => $request->description,
            'slug'        => $data_slug,
        ]);

        // Store Data Kategori(Mani to Many)
        $kategoris = $request->kategori;
        $video= Video::findOrFail($id);

        $video->kategori_videos()->sync($kategoris);

        return redirect('/video')->with('msg', 'Data Video Berhasil diupdate ');
    }

    // DELETE
    public function destroy($id)
    {
        dd($id);
        Video::destroy($id);

        return redirect('/vidoe')->with('msg', 'Data Video Berhasil dihapus');
    }
}
