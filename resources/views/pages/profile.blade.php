@extends('layouts.page_master')
@section('content')

<section id="entity_section" class="entity_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="entity_comments">
                    <div class="entity_inner__title header_black">
                        <h2>Profil Saya</h2>
                    </div>
                    <!--Entity Title -->

                    @if (session('msg'))
                        <p class="alert alert-info">{{session('msg')}}</p>
                    @endif

                    <div class="entity_comment_from">
                        <form action="/profile/{{$user->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <img  src="{{ url($user->img) }}" title="Gambar {{$user->title}}" alt="Gambar {{$user->title}}" width="122" height="122">
                                
                            <div class="form-group comment">
                                <input name="img" class="form-control" type="file" accept="image/*" placeholder="foto profile">

                                @if ($errors->has('img'))
                                    <p class="alert alert-danger">{{$errors->first('img')}}</p>
                                @endif
                            </div>
                            <div class="form-group comment">
                                <input name="name" type="tex" class="form-control"  placeholder="Masukkan Nama" value="{{$user->name}}">

                                @error('name')
                                    <p class="alert alert-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group comment">
                                <input  type="email" class="form-control"  placeholder="Masukkan Email" disabled value="{{$user->email}}">
                            </div>
                            <div class="form-group comment">
                                <input  type="text" class="form-control"  placeholder="Jenis kelamin" disabled value="{{$user->gender}}">
                            </div>
                            <div class="form-group comment">
                                <input type="text" class="form-control"  placeholder="Tanggal Lahir" disabled value="{{$user->date_birth}}">
                            </div>
                            <div class="form-group comment">
                                <input  type="text" class="form-control"  placeholder="Masukkan provinsi" disabled value="{{$user->provinci}}">
                            </div>

                            <button type="submit" class="btn btn-submit red">Perbaruhi</button>
                        </form>
                    </div>
                    <!--Entity Comments From -->

                </div>
                <!--Entity Comments -->

            </div>

            <!--Left Section-->

            <div class="col-md-4">
                {{-- Foto Profile --}}
                <div class="widget">

                    

                </div>
                {{-- END Foto Profile --}}
            </div>


        </div>
        <!-- row -->

    </div>
    <!-- container -->

</section>
<!-- Entity Section Wrapper -->


@endsection
