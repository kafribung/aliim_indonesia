@extends('layouts.master')
@section('title', 'Kategori Artikel')
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
                            <h4 class="box-title text-center">Kategori Artikel</h4>
                        </div>
                        <div class="table-stats">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $angkaAwal =  1
                                    @endphp
                                    @foreach ($kategoris as $kategori)
                                        
                                    <tr>
                                        <td>{{$angkaAwal}}</td>
                                        <td>{{$kategori->name}}</td>
                                        <td>
                                            <a href="/kategori/{{$kategori->id}}/edit" class="btn btn-warning btn-sm {{$kategori->status != 1 ? 'disabled' : ''}}"><i class="fa fa-edit"></i></a>

                                            <form action="/kategori/{{$kategori->id}}" method="POST" class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" onclick="return confirm('Hapus Data {{$kategori->email}}?')" class="btn btn-danger btn-sm" {{$kategori->status != 1 ? 'disabled' : ''}}><i class="fa fa-trash"></i></button>
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
