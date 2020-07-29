@extends('layouts.master')
@section('title', 'Edit Doa & Hadist | Aliim Indonesia')
@section('content')

<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">

        @if (session('msg'))
        <p class="alert alert-info">{{session('msg')}}</p>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card-body ">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Edit Data Doa & Hadist</strong>
                        </div>
                        <div class="card-body">
                            <form action="/doa-hadist/{{$doa->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Judul</label>
                                    <input id="title" name="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" autofocus required
                                        autocomplete="off" value="{{old('title') ? old('title') : $doa->title}}">

                                    @error('title')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="img" class="control-label mb-1">Gambar</label>
                                    <img src="{{url($doa->takeImg)}}" alt="Gambar {{$doa->slug}}" title="{{$doa->slug}}"
                                        width="200" height="200">
                                    <input id="img" name="img" type="file"
                                        class="form-control @error('img') is-invalid @enderror" autocomplete="off"
                                        accept="image/*">

                                    @error('img')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-warning btn-block">Update Doa
                                        Hadist</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /#add-category -->
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->

@endsection