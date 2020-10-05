@extends('layouts.master')
@section('title', 'Edit Admin | Aliim Indonesia')
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
                            <strong class="card-title">Edit Data Admin</strong>
                        </div>
                        <div class="card-body">
                            <form action="/admin/{{$admin->email}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                @include('dashboard_form.admin_form')
                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-warning btn-block">Update Admin</button>
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