@extends('layouts.master')
@section('title', 'Edit Iklan | Aliim Indonesia')
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
                            <strong class="card-title">Edit Data Iklan</strong>
                        </div>
                        <div class="card-body">
                            <form action="/iklan/{{$iklan->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                @include('dashboard_form.iklan_form', compact($iklan))
                                <button type="submit" class="btn btn-md btn-warning btn-block">Update Iklan</button>
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