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
                            <a href="/admin/create" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="table-stats">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Peran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $angkaAwal =  1
                                    @endphp
                                    @foreach ($admins as $admin)
                                        
                                    <tr>
                                        <td>{{$angkaAwal}}</td>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->status == 1 ? 'Active' : 'Panding'}}</td>
                                        <td>{{($admin->role == 0) ? 'User' : (($admin->role == 1) ? 'Admin' : 'Ustad')}}</td>
                                        <td>
                                            <a href="/admin/{{$admin->id}}/edit" class="btn btn-warning btn-sm {{$admin->status != 1 ? 'disabled' : ''}}"><i class="fa fa-edit"></i></a>

                                            <form action="/admin/{{$admin->id}}" method="POST" class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" onclick="return confirm('Hapus Data {{$admin->email}}?')" class="btn btn-danger btn-sm" {{$admin->status != 1 ? 'disabled' : ''}}><i class="fa fa-trash"></i></button>
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
