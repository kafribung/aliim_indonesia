@extends('layouts.master')
@section('title', 'User| Aliim Indonesia')
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
                            <h4 class="box-title text-center">User Aliim</h4>
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
                                        <th>Kabupaten</th>
                                        <th>Status</th>
                                        <th>Peran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $angkaAwal = 1
                                    @endphp
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{$angkaAwal++}}</td>
                                        <td class="avatar">
                                            <img class="lazy img-thumbnail" data-src="{{url($user->takeImg)}}" alt="Foto {{$user->name}}" title="Foto {{$user->name}}" width="80" height="80">
                                        </td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{ date('d-M-Y', strtotime($user->date_birth)) }}</td>
                                        <td>{{$user->gender}}</td>
                                        <td>{{$user->district}}</td>
                                        <td>{{$user->status == 1 ? 'Active' : 'Not Active'}}</td>
                                        <td>{{($user->role == 0) ? 'User' : (($user->role == 1) ? 'Admin' : 'Ustad')}}
                                        </td>
                                        <td>
                                            <a href="/user/{{$user->email}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            <form action="/user/{{$user->email}}" method="POST" class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Hapus Data {{$user->email}}?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>
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