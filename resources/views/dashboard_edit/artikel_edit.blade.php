@extends('layouts.master')
@section('title', 'Edit Artikel | Aliim Indoenesia')
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
                            <strong class="card-title">Edit Data Artikel</strong>
                        </div>
                        <div class="card-body">
                            <form action="/artikel/{{$artikel->slug}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                @include('dashboard_form.artikel_form', compact($artikel))
                                <button type="submit" class="btn btn-md btn-warning btn-block">Update
                                    Artikel</button>
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