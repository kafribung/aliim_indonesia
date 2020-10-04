@extends('layouts.master')
@section('title', 'Create Ustad | Aliim Indonesia')
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
                            <strong class="card-title">Tambah Data Ustad</strong>
                        </div>
                        <div class="card-body">
                            <form action="/ustad" method="POST" enctype="multipart/form-data">
                                @csrf
                                @include('dashboard_form.ustad_form', ['ustad' => new App\Models\User])
                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-info btn-block">Tambah Ustad</button>
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