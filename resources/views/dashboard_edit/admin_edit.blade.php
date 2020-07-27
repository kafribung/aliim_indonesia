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
                            <form action="/admin/{{$admin->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="form-group">
                                    <label for="img" class="control-label mb-1">Foto</label>
                                    <img src="{{url($admin->takeImg)}}" alt="Gambar {{$admin->name}}"
                                        title="Gambar {{$admin->name}}" width="100" height="100">
                                    <input id="img" name="img" type="file"
                                        class="form-control @error('img') is-invalid @enderror" autofocus required
                                        autocomplete="off">

                                    @error('img')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">nama</label>
                                    <input id="name" name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" required
                                        autocomplete="off" value="{{old('name') ? old('name') : $admin->name}}">

                                    @error('name')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">email</label>
                                    <input id="email" name="email" email="email"
                                        class="form-control @error('email') is-invalid @enderror" autocomplete="off"
                                        required value="{{old('email') ? old('email') : $admin->email}}">

                                    @if ($errors->has('email'))
                                    <p class="alert alert-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label for="date_birth" class="control-label mb-1">Tgl Lahir</label>
                                    <input id="date_birth" name="date_birth" type="date"
                                        class="form-control @error('date_birth') is-invalid @enderror" required
                                        autocomplete="off"
                                        value="{{old('date_birth') ? old('date_birth') : $admin->date_birth}}">

                                    @error('date_birth')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="gender" class="control-label mb-1">Jenis Kelamin</label>
                                    <select id="gender" name="gender"
                                        class="form-control @error('gender') is-invalid @enderror" required
                                        autocomplete="off">
                                        <option {{$admin->gender == 'Pria' ? 'selected' : ''}} value="Pria">Pria
                                        </option>
                                        <option {{$admin->gender == 'Wanita' ? 'selected' : ''}} value="Wanita">Wanita
                                        </option>
                                    </select>

                                    @error('gender')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="provinci" class="control-label mb-1">Provinsi</label>
                                    <select id="provinci" name="provinci"
                                        class="form-control @error('provinci') is-invalid @enderror" required
                                        autocomplete="off">
                                        @foreach ($provincis['provinsi'] as $provinci)
                                        <option {{ $admin->provinci == $provinci['nama'] ? 'selected' : '' }}
                                            value="{{$provinci['nama']}}">{{$provinci['nama']}}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('provinci')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label mb-1">password</label>
                                    <input id="password" name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" autocomplete="off"
                                        required ">

                                    @error('password')
                                        <p class=" alert alert-danger">{{$message}}</p>
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