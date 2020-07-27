@extends('layouts.master')
@section('title', 'Ustad | Aliim Indonesia')
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
                            <h4 class="box-title text-center">Ustad Aliim</h4>
                            <a href="/ustad/create" class="btn btn-primary btn-sm float-right"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                        <div class="table-stats">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tgl Lahir</th>
                                        <th>JK</th>
                                        <th>Provinsi</th>
                                        <th>Status</th>
                                        <th>Peran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $angkaAwal = 1
                                    @endphp
                                    @foreach ($ustads as $ustad)

                                    <tr>
                                        <td>{{$angkaAwal}}</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="#"><img class="rounded-circle" src="{{url($ustad->takeImg)}}"
                                                        alt="Foto {{$ustad->name}}" title="Foto {{$ustad->name}}"></a>
                                            </div>
                                        </td>
                                        <td>{{$ustad->name}}</td>
                                        <td>{{$ustad->email}}</td>
                                        <td>{{$ustad->date_birth}}</td>
                                        <td>{{$ustad->gender}}</td>
                                        <td>{{$ustad->provinci}}</td>
                                        <td>{{$ustad->status == 1 ? 'Active' : 'Panding'}}</td>
                                        <td>{{($ustad->role == 0) ? 'User' : (($ustad->role == 1) ? 'Admin' : 'Ustad')}}
                                        </td>
                                        <td>
                                            <a href="/ustad/{{$ustad->id}}/edit"
                                                class="btn btn-warning btn-sm {{$ustad->status != 1 ? 'disabled' : ''}}"><i
                                                    class="fa fa-edit"></i></a>

                                            <form action="/ustad/{{$ustad->id}}" method="POST" class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    onclick="return confirm('Hapus Data Ustad {{$ustad->name}}?')"
                                                    class="btn btn-danger btn-sm"
                                                    {{$ustad->status != 1 ? 'disabled' : ''}}><i
                                                        class="fa fa-trash"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                    @php
                                    $angkaAwal++
                                    @endphp
                                    @endforeach

                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
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