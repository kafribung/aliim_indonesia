@extends('layouts.master')
@section('title', 'Create Galeri | Aliim Indonesia')
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
                            <strong class="card-title">Tambah Data Galeri</strong>
                        </div>
                        <div class="card-body">
                            <form action="/galeri" method="POST" enctype="multipart/form-data">
                                @csrf
                                @include('dashboard_form.galeri_form', ['galeri' => new App\Models\Galeri])
                                <button type="submit" class="btn btn-md btn-info btn-block">Tambah Galeri</button>
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