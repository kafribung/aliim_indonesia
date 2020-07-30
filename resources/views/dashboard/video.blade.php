@extends('layouts.master')
@section('title', 'Video | Aliim Indonesia')
@section('content')

<!-- Content -->
<div class="content">

    <!-- Animated -->
    <div class="animated fadeIn">

        @if (session('msg'))
        <p class="alert alert-info">{{session('msg')}}</p>
        @endif

        <div class="row">
            @foreach ($videos as $video)
            <div class="col-md-3">
                <aside class="profile-nav alt">
                    <section class="card">
                        <div class="card-header">
                            @foreach ($video->kategori_videos as $kategori)
                            <p class="badge badge-primary">{{$kategori->title}}</p>
                            @endforeach
                            <h6 class="card-title mb-3">{{$video->title}}</h6>
                        </div>
                        <div class="card-header alt bg-dark">
                            <iframe class="align-self-center p-2" style="width:240px; height:200px;" alt="video"
                                src="{{$video->video}}" frameborder="0"></iframe>
                        </div>
                        <div class="card-body">
                            {!! Str::limit($video->description, 80) !!}
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <small>{{ $video->user->name }} | </small>
                            <small>{{ $video->created_at->diffForHumans() }}</small>
                        </div>
                        <hr>

                        <a href="/video/{{$video->slug}}/edit" class="btn btn-outline-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>

                        <div class="card-text text-sm-center">
                            @can('edit', $video)
                            <a href="/video/{{$video->slug}}/edit" class="btn btn-outline-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            @endcan
                            @can('delete', $video)
                            <form action="/video/{{$video->id}}" method="POST" class="d-inline-flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus Data {{$video->title}} ?')"
                                    class="btn btn-outline-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            @endcan
                        </div>
                    </section>
                </aside>
            </div>
            @endforeach
        </div>

    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
@endsection