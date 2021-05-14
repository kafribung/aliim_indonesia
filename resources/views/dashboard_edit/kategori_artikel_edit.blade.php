@extends('layouts.master')
@section('title', 'Edit  Kategori Artikel | Aliim Indonesia')
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
                            <strong class="card-title">Edit Kategori Artikel</strong>
                        </div>
                        <div class="card-body">
                            <form action="/kategori-artikel/{{$kategori->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                @include('dashboard_form.kategori_artikel_form', ['kategori' => $kategori,  'create' => false])
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

