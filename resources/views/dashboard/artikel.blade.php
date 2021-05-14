@extends('layouts.master')
@section('title', 'Artikel | Aliim Indonesia')
@section('content')
@include('dashboard_form.cari_form', ['data' => request()->path()])
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        @if (session('msg'))
        <p class="alert alert-info">{{session('msg')}}</p>
        @endif
        <a class="btn btn-primary btn-sm justify-content-end " href="/artikel/create"><i class="fa fa-plus"></i></a>
        <div class="row">
            @forelse ($artikels as $artikel)
                
            <div class="col-md-3">
                <aside class="profile-nav alt">
                    <section class="card">
                        <div class="card-header">
                            @foreach ($artikel->kategori_artikels as $kategori)
                            <p class="badge badge-primary">{{$kategori->title}}</p>
                            @endforeach
                            <h6 class="card-title mb-3">{{$artikel->title}}</h6>
                        </div>
                        <div class="card-header alt bg-dark">
                            <img class="lazy img-thumbnail align-self-center mr-3" style="width:400px" alt="artikel" data-src="{{url($artikel->takeImg)}}">
                        </div>
                        <div class="card-body">
                            {!! Str::limit($artikel->description, 80) !!}
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between p-1">
                            <small>{{ $artikel->user->name }}</small>
                            <small>{{ $artikel->created_at->diffForHumans() }}</small>
                        </div>
                        <hr>

                        <div class="card-text text-sm-center">
                            @can('edit', $artikel)
                            <a href="/artikel/{{$artikel->slug}}/edit" class="btn btn-outline-warning btn-sm"> <i class="fa fa-edit"></i> </a>
                            @endcan

                            @can('delete', $artikel)
                            <form action="/artikel/{{$artikel->slug}}" method="POST" class="d-inline-flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus Data {{$artikel->title}} ?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
                            @endcan
                        </div>
                    </section>
                </aside>
            </div>
            @empty
                <p class="text-center alert alert-light">Data Artikel Tidak Ditemukan ...</p>
            @endforelse
        </div>
        <div class="row float-right">
            {{ $artikels->links('pagination::simple-bootstrap-4') }}
        </div>
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
@endsection