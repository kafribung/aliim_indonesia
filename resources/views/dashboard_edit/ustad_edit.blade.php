@extends('layouts.master')
@section('title', 'Edit Ustad | Aliim Indonesia ')
@section('content')

<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-12">
                <div class="card-body ">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Edit Data Ustad</strong>
                        </div>
                        <div class="card-body">
                            <form action="/ustad/{{$ustad->email}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                @include('dashboard_form.ustad_form', compact($ustad))
                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-warning btn-block">Update Ustad</button>
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