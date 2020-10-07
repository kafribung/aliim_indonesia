@extends('layouts.master')
@section('title', 'Edit Video | Aliim Indonesia')
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
                            <strong class="card-title">Edit Data Video</strong>
                        </div>
                        <div class="card-body">
                            <form action="/video/{{$video->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('dashboard_form.video_form', compact($video))
                                <button type="submit" class="btn btn-md btn-warning btn-block">Update Video</button>
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