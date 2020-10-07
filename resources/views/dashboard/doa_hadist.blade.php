@extends('layouts.master')
@section('title', 'Doa & Hadist | Aliim Indonesia')
@section('content')

@include('dashboard_form.cari_form', ['data' => request()->path()])

<!-- Content -->
<div class="content">

    <!-- Animated -->
    <div class="animated fadeIn">

        @if (session('msg'))
        <p class="alert alert-info">{{session('msg')}}</p>
        @endif

        <div class="row">
            @forelse ($doaHadists as $doaHadist)
            <div class="col-md-3">
                <aside class="profile-nav alt">
                    <section class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">{{$doaHadist->title}}</strong>
                        </div>
                        <div class="card-header alt bg-dark">
                            <img class="align-self-center mr-3" style="width:400px; height:200px;" alt="artikel"
                                src="{{ url($doaHadist->takeImg) }}">
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <small>{{ $doaHadist->user->name }}</small>
                            <small>{{ $doaHadist->created_at->diffForHumans() }}</small>
                        </div>
                        <hr>

                        @can('author', $doaHadist)
                        <div class="card-text text-sm-center">
                            <a href="/doa-hadist/{{$doaHadist->slug}}/edit" class="btn btn-outline-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="/doa-hadist/{{$doaHadist->slug}}" method="POST" class="d-inline-flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus Data {{$doaHadist->title}} ?')"
                                    class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        @endcan
                    </section>
                </aside>
            </div>
            @empty
            <p class="text-center alert alert-light">Data Doa & Hadist Tidak Ditemukan ...</p>
            @endforelse
        </div>
        <div class="row float-right">
            {{ $doaHadists->links('pagination::simple-bootstrap-4') }}
        </div>
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
@endsection