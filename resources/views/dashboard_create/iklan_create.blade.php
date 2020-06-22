@extends('layouts.master')
@section('title', 'Create Iklan | Aliim Indonesia')
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
                            <strong class="card-title">Tambah Data Iklan</strong>
                        </div>
                        <div class="card-body">
                            <form action="/iklan" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="img" class="control-label mb-1">Gambar</label>
                                    <input id="img" name="img" type="file" class="form-control @error('img') is-invalid @enderror" autofocus required autocomplete="off" accept="image/*">

                                    @error('img')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Judul</label>
                                    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror"  required autocomplete="off" value="{{old('title')}}">

                                    @error('title')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="owner" class="control-label mb-1">Pemilik</label>
                                    <input id="owner" name="owner" type="text" class="form-control @error('owner') is-invalid @enderror"  required autocomplete="off" value="{{old('owner')}}">

                                    @error('owner')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="wa" class="control-label mb-1">WA</label>
                                    <input id="wa" name="wa" type="number" class="form-control @error('wa') is-invalid @enderror"  required autocomplete="off" value="{{old('wa')}}">

                                    @error('wa')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="link" class="control-label mb-1">URL</label>
                                    <input id="link" name="link" type="url" class="form-control @error('link') is-invalid @enderror"  required autocomplete="off" value="{{old('link')}}">

                                    @error('link')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-info btn-block">Tambah Iklan</button>
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

