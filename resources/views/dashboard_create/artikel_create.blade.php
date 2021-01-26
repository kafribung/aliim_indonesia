@extends('layouts.master')
@section('title', 'Create Artikel | Aliim Indonesia ')
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
                            <strong class="card-title">Tambah Data Artikel</strong>
                        </div>
                        <div class="card-body">
                            <form action="/artikel" method="POST" enctype="multipart/form-data" novalidate>
                                @csrf
                                @include('dashboard_form.artikel_form', ['artikel' => new App\Models\Artikel])
                                <button type="submit" class="btn btn-md btn-info btn-block">Tambah Artikel</button>
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