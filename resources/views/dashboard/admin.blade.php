@extends('layouts.master')
@section('title', 'Admin | Aliim Indonesia')
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
                            <h4 class="box-title text-center">Admin Aliim</h4>
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
                                    @foreach ($admins as $admin)

                                    <tr>
                                        <td>{{$angkaAwal++}}</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <img class="rounded-circle" src="{{url($admin->takeImg)}}"
                                                    alt="Foto {{$admin->name}}" title="Foto {{$admin->name}}">
                                            </div>
                                        </td>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->date_birth}}</td>
                                        <td>{{$admin->gender}}</td>
                                        <td>{{$admin->provinci}}</td>
                                        <td>{{$admin->status == 1 ? 'Active' : 'Not Active'}}</td>
                                        <td>{{($admin->role == 0) ? 'User' : (($admin->role == 1) ? 'Admin' : 'Ustad')}}
                                        </td>
                                        <td>
                                            <a href="/admin/{{$admin->email}}/edit"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
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