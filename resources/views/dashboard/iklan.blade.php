@extends('layouts.master')
@section('title', 'Iklan | Aliim Indonesia')
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
                            <h4 class="box-title text-center">Iklan Aliim</h4>
                            <a href="/iklan/create" class="btn btn-primary btn-sm float-right">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="table-stats">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Pemilik</th>
                                        <th>WA</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $angkaAwal = 1
                                    @endphp
                                    @foreach ($iklans as $iklan)
                                    <tr>
                                        <td>{{$angkaAwal++}}</td>
                                        <td>
                                            <img class="lazy img-thumbnail" data-src="{{url($iklan->takeImg)}}" alt="Foto {{$iklan->name}}"
                                                title="Foto {{$iklan->name}}" width="100">
                                        </td>
                                        <td>{{$iklan->owner}}</td>
                                        <td>{{$iklan->wa}}</td>
                                        <td><a href="{{$iklan->link}}" target="_blank">{{$iklan->link}}</a></td>
                                        <td>
                                            <a href="/iklan/{{$iklan->id}}/edit"
                                                class="btn btn-outline-warning btn-sm ">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <form action="/iklan/{{$iklan->id}}" method="POST" class="d-inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Hapus Data iklan {{$iklan->name}}?')"
                                                    class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>
                                                </button>
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