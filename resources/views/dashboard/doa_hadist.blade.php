@extends('layouts.master')
@section('title', 'Doa & Hadist | Aliim Indonesia')
@section('content')

 <!-- Content -->
<div class="content">
    
    <!-- Animated -->
    <div class="animated fadeIn">

        @if (session('msg'))
            <p class="alert alert-info">{{session('msg')}}</p>
        @endif

        <div class="row">
             @foreach ($doas as $doa)
                <div class="col-md-3">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">{{$doa->title}}</strong>
                            </div>
                            <div class="card-header alt bg-dark">
                                <img class="align-self-center mr-3" style="width:400px; height:200px;" alt="artikel" src="{{url($doa->img)}}">
                            </div>
                            
                            <hr>

                            @if ($doa->author())
                                <div class="card-text text-sm-center">
                                    <a href="/doa-hadist/{{$doa->slug}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                    <form action="/doa-hadist/{{$doa->id}}" method="POST" class="d-inline-flex">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" onclick="return confirm('Hapus Data {{$doa->title}} ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            @endif

                        </section>
                    </aside>
                </div>
             @endforeach
        </div>
        
    </div>
    <!-- .animated -->
</div>
<!-- /.content -->   
@endsection

