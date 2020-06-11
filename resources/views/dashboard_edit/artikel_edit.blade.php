@extends('layouts.master')
@section('title', 'Edit | Artikel')
@section('content')

<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-12">
                <div class="card-body ">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Edit Artikel</strong>
                        </div>
                        <div class="card-body">
                            <form action="/artikel/{{$artikel->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">judul</label>
                                    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" autofocus required autocomplete="off" value="{{old('title')?old('title') : $artikel->title}}">

                                    @error('title')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="img" class="control-label mb-1">gambar</label>
                                    <img src="{{url($artikel->img)}}" alt="Gambar {{$artikel->slug}}" title="{{$artikel->slug}}" width="200" height="200">
                                    <input id="img" name="img" type="file" class="form-control @error('img') is-invalid @enderror" accept="image/*">

                                    @if ($errors->has('img'))
                                        <p class="alert alert-danger">{{$errors->first('img')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="kategori" class="control-label mb-1">kategori</label>

                                    @foreach ($artikel->kategori_artikels as $old)
                                        <select id="kategori" name="kategori" class="form-control @error('kategori') is-invalid @enderror" required autocomplete="off">
                                            @foreach ($kategoris as $kategori)
                                                <option {{$old->id == $kategori->id ? 'selected' : ''}} value="{{$kategori->id}}">{{$kategori->title}}</option>
                                            @endforeach
                                        </select>
                                    @endforeach

                                    @error('kategori')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label mb-1">deskripsi</label>
                                    <input id="description" name="description" type="text" class="form-control ckeditor @error('description') is-invalid @enderror"  required autocomplete="off" value="{{old('description') ? old('description') : $artikel->description}}">

                                    @error('description')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-warning btn-block">Update Artikel</button>
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

@push('after_script')
<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '.ckeditor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>
@endpush
@endsection
