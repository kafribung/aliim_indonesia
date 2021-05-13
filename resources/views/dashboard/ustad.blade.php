@extends('layouts.master')
@section('title', 'Ustad | Aliim Indonesia')
@section('content')
@include('dashboard_form.cari_form', ['data' => request()->path()])
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
                            <a href="/ustad/create" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></a>
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
                                    @forelse ($ustads as $ustad)
                                    <tr>
                                        <td>{{$angkaAwal++}}</td>
                                        <td class="avatar">
                                            <img class="lazy img-thumbnail" src="{{url($ustad->takeImg)}}" alt="Foto {{$ustad->name}}" title="Foto {{$ustad->name}}">
                                        </td>
                                        <td>{{$ustad->name}}</td>
                                        <td>{{$ustad->email}}</td>
                                        <td>{{$ustad->date_birth}}</td>
                                        <td>{{$ustad->gender}}</td>
                                        <td>{{$ustad->district}}</td>
                                        <td>{{$ustad->status == 1 ? 'Active' : 'Panding'}}</td>
                                        <td>{{($ustad->role == 0) ? 'User' : (($ustad->role == 1) ? 'Admin' : 'Ustad')}}
                                        </td>
                                        <td>
                                            <a href="/ustad/{{$ustad->email}}/edit" class="btn btn-warning btn-sm {{$ustad->status != 1 ? 'disabled' : ''}}"><i class="fa fa-edit"></i></a>
                                            <form action="/ustad/{{$ustad->email}}" method="POST" class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Hapus Data Ustad {{$ustad->name}}?')" class="btn btn-danger btn-sm" {{$ustad->status != 1 ? 'disabled' : ''}}><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <p class="alert alert-info">Data Ustad Belum ditambahkan</p>                                        
                                    @endforelse
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row float-right">
            {{ $ustads->links('pagination::simple-bootstrap-4') }}
        </div>
        <!-- /#add-category -->
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->
@endsection