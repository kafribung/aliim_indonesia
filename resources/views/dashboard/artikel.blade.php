@extends('layouts.master')
@section('title', 'Artikel | Aliim Indonesia')
@section('content')

<!-- Content -->
<div class="content">

    <!-- Animated -->
    <div class="animated fadeIn">

        @if (session('msg'))
        <p class="alert alert-info">{{session('msg')}}</p>
        @endif

        <div class="row">
            @foreach ($artikels as $artikel)
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
                            <img class="align-self-center mr-3" style="width:400px" alt="artikel"
                                src="{{url($artikel->takeImg)}}">
                        </div>
                        <div class="card-body">
                            {!! Str::limit($artikel->description, 80) !!}
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <small>{{ $artikel->user->name }} | </small>
                            <small>{{ $artikel->created_at->diffForHumans() }}</small>
                        </div>
                        <hr>

                        {{-- Auth Lama --}}
                        {{-- @if ($artikel->author())
                        @endif --}}

                        <div class="card-text text-sm-center">
                            @can('edit', $artikel)
                            <a href="/artikel/{{$artikel->slug}}/edit" class="btn btn-outline-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            @endcan

                            @can('delete', $artikel)
                            <form action="/artikel/{{$artikel->id}}" method="POST" class="d-inline-flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus Data {{$artikel->title}} ?')"
                                    class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
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