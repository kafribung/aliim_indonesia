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
                                <div class="form-group">
                                    <label for="img" class="control-label mb-1">Foto</label>
                                    <input id="img" name="img" type="file"
                                        class="form-control @error('img') is-invalid @enderror" autofocus required
                                        autocomplete="off" value="{{old('img')}}">

                                    @error('img')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Nama</label>
                                    <input id="name" name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" required
                                        autocomplete="off" value="{{old('name')}}">

                                    @error('name')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email</label>
                                    <input id="email" name="email" email="email"
                                        class="form-control @error('email') is-invalid @enderror" required
                                        autocomplete="off" value="{{old('email')}}">

                                    @if ($errors->has('email'))
                                    <p class="alert alert-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="date_birth" class="control-label mb-1">Tgl Lahir</label>
                                    <input id="date_birth" name="date_birth" type="date"
                                        class="form-control @error('date_birth') is-invalid @enderror" required
                                        autocomplete="off" value="{{old('date_birth')}}">

                                    @error('date_birth')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="gender" class="control-label mb-1">Jenis Kelamin</label>
                                    <select id="gender" name="gender"
                                        class="form-control @error('gender') is-invalid @enderror" required
                                        autocomplete="off">
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
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
                                        <option value="{{$provinci['nama']}}">{{$provinci['nama']}}</option>
                                        @endforeach
                                    </select>

                                    @error('provinci')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label mb-1">Password</label>
                                    <input id="password" name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" required
                                        autocomplete="off" value="{{old('password')}}">

                                    @error('password')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

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