@extends('layouts.master')
@section('title', 'Create | Video')
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
                            <strong class="card-title">Add Video</strong>
                        </div>
                        <div class="card-body">
                            <form action="/video" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">judul</label>
                                    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" autofocus  autocomplete="off" value="{{old('title')}}">

                                    @error('title')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="video" class="control-label mb-1">video</label>
                                    <input id="video" name="video" type="url" class="form-control @error('video') is-invalid @enderror" autocomplete="off" value="{{old('video')}}">

                                    @if ($errors->has('video'))
                                        <p class="alert alert-danger">{{$errors->first('video')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="kategori" class="control-label mb-1">kategori</label>

                                    <select id="kategori" name="kategori" class="form-control @error('kategori') is-invalid @enderror"  autocomplete="off">
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{$kategori->id}}">{{$kategori->title}}</option>
                                        @endforeach
                                    </select>

                                    @error('kategori')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="description" class="control-label mb-1">deskripsi</label>
                                    <textarea id="description" name="description" class="form-control ckeditor @error('description') is-invalid @enderror"  >{{old('description')}}</textarea>

                                    @error('description')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-info btn-block">Tambah video</button>
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

