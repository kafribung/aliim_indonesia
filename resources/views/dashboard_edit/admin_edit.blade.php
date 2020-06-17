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
                            <form action="/admin/{{$admin->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">nama</label>
                                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" autofocus required autocomplete="off" value="{{old('name') ? old('name') : $admin->name}}">

                                    @error('name')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">email</label>
                                    <input id="email" name="email" email="email" class="form-control @error('email') is-invalid @enderror"  autocomplete="off" required value="{{old('email') ? old('email') : $admin->email}}">

                                    @if ($errors->has('email'))
                                        <p class="alert alert-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label mb-1">password</label>
                                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror"  autocomplete="off" required ">

                                    @error('password')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

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
