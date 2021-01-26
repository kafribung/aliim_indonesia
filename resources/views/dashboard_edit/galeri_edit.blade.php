@extends('layouts.master')
@section('title', 'Edit Galeri | Aliim Indonesia')
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
                            <strong class="card-title">Edit Data Galeri</strong>
                        </div>
                        <div class="card-body">
                            <form action="/galeri/{{$galeri->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                @include('dashboard_form.galeri_form', compact($galeri))
                                <button type="submit" class="btn btn-md btn-warning btn-block">Update Galeri</button>
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