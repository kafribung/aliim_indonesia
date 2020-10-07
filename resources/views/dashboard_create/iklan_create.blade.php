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
                                @include('dashboard_form.iklan_form', ['iklan' => new App\Models\Iklan])
                                <button type="submit" class="btn btn-md btn-info btn-block">Tambah Iklan</button>
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

