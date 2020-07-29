@extends('layouts.master')
@section('title', 'Edit Iklan | Aliim Indonesia')
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
                            <strong class="card-title">Edit Data Iklan</strong>
                        </div>
                        <div class="card-body">
                            <form action="/iklan/{{$iklan->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="form-group">
                                    <label for="img" class="control-label mb-1">Gambar</label>
                                    <img src="{{url($iklan->takeImg)}}" alt="Gambar Error" width="100" height="100">
                                    <input id="img" name="img" type="file"
                                        class="form-control @error('img') is-invalid @enderror" autofocus required
                                        autocomplete="off" accept="image/*">

                                    @error('img')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Judul</label>
                                    <input id="title" name="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" required
                                        autocomplete="off" value="{{old('title') ? old('title') : $iklan->title}}">

                                    @error('title')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="owner" class="control-label mb-1">Pemilik</label>
                                    <input id="owner" name="owner" type="text"
                                        class="form-control @error('owner') is-invalid @enderror" required
                                        autocomplete="off" value="{{old('owner') ? old('owner') : $iklan->owner}}">

                                    @error('owner')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="wa" class="control-label mb-1">WA</label>
                                    <input id="wa" name="wa" type="number"
                                        class="form-control @error('wa') is-invalid @enderror" required
                                        autocomplete="off" value="{{old('wa') ? old('wa') : $iklan->wa}}">

                                    @error('wa')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="link" class="control-label mb-1">URL</label>
                                    <input id="link" name="link" type="url"
                                        class="form-control @error('link') is-invalid @enderror" required
                                        autocomplete="off" value="{{old('link') ? old('link') : $iklan->link}}">

                                    @error('link')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-warning btn-block">Update Iklan</button>
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