@extends('layouts.master')
@section('title', 'User Edit')
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
                            <strong class="card-title">Edit User</strong>
                        </div>
                        <div class="card-body">
                            <form action="/user/{{$user->email}}" method="POST" enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PATCH')
                                @include('dashboard_form.user_form', compact($user))
                                <button type="submit" class="btn btn-md btn-warning btn-block">Update User</button>
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