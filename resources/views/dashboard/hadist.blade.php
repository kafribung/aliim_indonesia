@extends('layouts.master')
@section('title', 'Hadist Harian | Aliim Indonesia')
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
                            <h4 class="box-title text-center">Hadist Harian Aliim</h4>
                            <a href="/hadist/create" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="table-stats">
                            <table class="table table-hover">
                                <tbody>
                                    @php
                                        $angkaAwal =  1
                                    @endphp
                                    @foreach ($hadists as $hadist)
                                        <tr>
                                            <th>No</th>
                                            <td>{{$angkaAwal}}</td>
                                        </tr>

                                        <tr>
                                            <th>Judul</th>
                                            <td>{{$hadist->title}}</td>
                                        </tr>

                                        <tr>
                                            <th>Sanad</th>
                                            <td>{{$hadist->info}}</td>
                                        </tr>

                                        <tr>
                                            <th>Hadist</th>
                                            <td>{!! $hadist->description !!}</td>
                                        </tr>

                                        <tr>
                                            <th>Action</th>
                                            <td>
                                                <a href="/hadist/{{$hadist->id}}/edit" class="btn btn-warning btn-sm "><i class="fa fa-edit"></i></a>

                                                <form action="/hadist/{{$hadist->id}}" method="POST" class="d-inline-flex">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" onclick="return confirm('Hapus Data hadist {{$hadist->title}}?')" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button>
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
