@extends('layouts.master')
@section('title', 'Galeri | Aliim Indonesia')
@section('content')

<!-- Content -->
<div class="content">

    <!-- Animated -->
    <div class="animated fadeIn">

        @if (session('msg'))
        <p class="alert alert-info">{{session('msg')}}</p>
        @endif
        <a class="btn btn-primary btn-sm" href="/galeri/create"><i class="fa fa-plus"></i></a>

        <div class="row">
            @forelse ($galeris as $galeri)
            <div class="col-md-3">
                <aside class="profile-nav alt">
                    <section class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">{{$galeri->title}}</strong>
                        </div>
                        <div class="card-header alt bg-dark">
                            <img class="lazy img-thumbnail align-self-center mr-3" style="width:400px; height:200px;" alt="artikel" data-src="{{ url($galeri->takeImg) }}">
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <small>{{ $galeri->user->name }}</small>
                            <small>{{ $galeri->created_at->diffForHumans() }}</small>
                        </div>
                        <hr>

                        @can('author', $galeri)
                        <div class="card-text text-sm-center">
                            <a href="/galeri/{{$galeri->id}}/edit" class="btn btn-outline-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="/galeri/{{ $galeri->id }}" method="POST" class="d-inline-flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus Data {{$galeri->title}} ?')"
                                    class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        @endcan
                    </section>
                </aside>
            </div>
            @empty
            <p class="text-center alert alert-light">Data Galeri Tidak Ditemukan ...</p>
            @endforelse
        </div>
        <div class="row float-right">
            {{ $galeris->links('pagination::simple-bootstrap-4') }}
        </div>
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
@endsection