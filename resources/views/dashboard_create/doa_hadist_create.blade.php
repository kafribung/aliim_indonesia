@extends('layouts.master')
@section('title', 'Create Doa & Hadist | Aliim Indonesia')
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
                            <strong class="card-title">Tambah Data Doa & Hadist</strong>
                        </div>
                        <div class="card-body">
                            <form action="/doa-hadist" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Judul</label>
                                    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" autofocus required autocomplete="off" value="{{old('title')}}">

                                    @error('title')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="img" class="control-label mb-1">Gambar</label>
                                    <input id="img" name="img" type="file" class="form-control @error('img') is-invalid @enderror"  required autocomplete="off" accept="image/*">

                                    @error('img')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-info btn-block">Tambah Doa Hadist</button>
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

