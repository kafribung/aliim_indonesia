@extends('layouts.page_master')
@section('content')

<section id="entity_section" class="entity_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="entity_wrapper">
                    <div class="entity_title">
                        <h1>{{ $artikel->title }}</h1>
                    </div>
                    <!-- entity_title -->
                    <div class="entity_meta">
                        <a href="">{{$artikel->user->name}}</a> <span>|</span>
                        <a href="">{{ $artikel->created_at->format('d-m-Y') }}</a>
                    </div>
                    <!-- entity_meta -->
                    <div class="entity_social" style="margin-top: 8px; padding:0% ">
                        <div class="sharethis-inline-share-buttons"></div>
                    </div>
                    <!-- entity_social -->
                    <div class="entity_thumb">
                        <img class="img-responsive" src="{{ url($artikel->takeImg) }}"
                            title="Gambar {{ $artikel->title }}" alt="Gambar {{ $artikel->title }}" width="955"
                            height="832">
                    </div>
                    <!-- entity_thumb -->

                    <div class="entity_content">
                        {!! $artikel->description !!}
                    </div>
                    <!-- entity_content -->

                    <div class="entity_footer">
                        <div class="entity_tag">
                            @foreach ($artikel->kategori_artikels as $kategori)
                            <span class="blank">{{ $kategori->title }}</span>
                            @endforeach
                        </div>
                        <!-- entity_tag -->
                        <div class="entity_social">
                            <span><i class="fa fa-share-alt"></i>424 <a href="">Shares</a> </span>
                            <span><i class="fa fa-comments-o"></i>4 <a href="">Comments</a> </span>
                        </div>
                        <!-- entity_social -->
                    </div>
                    <!-- entity_footer -->
                </div>
                <!-- entity_wrapper -->

                <div class="related_news">
                    <div class="entity_inner__title header_purple">
                        <h2>Artikel Lainya</h2>
                    </div>
                    <!-- entity_title -->
                    <div class="row">
                        @foreach ($artikel->kategori_artikels as $kategori)
                        @foreach ($kategori->artikels()->limit(3)->get() as $artikel)
                        <div class="col-md-6">
                            <div class="media">
                                <div class="media-left">
                                    <a href="">
                                        <img class="media-object" src="{{ url($artikel->takeImg) }}"
                                            title="Gambar {{ $artikel->title }}" alt="Gambar {{ $artikel->title }}"
                                            width="122" height="122">
                                    </a>
                                </div>
                                <div class="media-body">
                                    @foreach ($artikel->kategori_artikels as $kategori)
                                    <span class="tag purple">{{ $kategori->title }}</span>
                                    @endforeach
                                    <h3 class="media-heading">
                                        <a href="/artikel-islam/{{ $artikel->slug }}"
                                            target="_self">{{ $artikel->title }}</a>
                                    </h3>
                                    <span class="media-date">
                                        <a href="">{{ $artikel->created_at->diffForHumans() }}</a>, by:
                                        <a href="">{{$artikel->user->name}}</a>
                                    </span>

                                    <div class="media_social">
                                        <span><a href=""><i class="fa fa-share-alt"></i>424</a>
                                            Shares</span>
                                        <span><a href=""><i class="fa fa-comments-o"></i>4</a>
                                            Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
                <!-- Related news -->

                <div class="entity_comments">
                    <div class="entity_inner__title header_black">
                        <h2>Komentar</h2>
                    </div>
                    <!--Entity Title -->

                    <div class="entity_comment_from">
                        <form action="/komentar-artikel/{{ $artikel->id }}" method="POST">
                            @csrf
                            <div class="form-group comment">
                                <textarea class="form-control" name="description" id="inputComment"
                                    placeholder="Komentar disini"></textarea>
                            </div>
                            <button type="submit" class="btn btn-submit green float-right">Komentar</button>
                        </form>
                    </div>
                    <!--Entity Comments From -->
                </div>
                <!--Entity Comments -->
                <div class="readers_comment">
                    <div class="entity_inner__title header_purple">
                        <h2>Baca Komentar</h2>
                    </div>
                    <!-- entity_title -->
                    @foreach ($artikel->komentars as $komentar)
                    <div class="media">
                        <div class="media-left">
                            <a href="">
                                <img alt="64x64" class="media-object" data-src="{{ url($komentar->user->takeImg) }}"
                                    src="{{ url($komentar->user->takeImg) }}" height="64" width="64"
                                    data-holder-rendered="true">
                            </a>
                        </div>
                        <div class="media-body">
                            <h2 class="media-heading"><a href="">{{ $komentar->user->name }}</a></h2>
                            <p>{{ $komentar->description }}</p>


                            <div class="entity_vote">
                                @can('edit', $komentar)
                                <a href=""><i class="fa fa-edit btn-warning" aria-hidden="true"></i></a>
                                @endcan

                                @can('delete', $komentar)
                                <a href="" onclick="submit()"><i class="fa fa-trash btn-daanger"
                                        aria-hidden="true"></i></a>
                                <a href=""><span class="reply_ic">Reply </span></a>
                                @endcan
                            </div>
                            {{-- <div class="media">
                                <div class="media-left">
                                    <a href="">
                                        <img alt="64x64" class="media-object" data-src="assets/img/reader_img2.jpg"
                                            src="assets/img/reader_img2.jpg" data-holder-rendered="true">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h2 class="media-heading"><a href="">Admin</a></h2>
                                    But who has any right to find fault with a man who chooses to enjoy
                                    a pleasure
                                    that has no annoying consequences, or one who avoids a pain that
                                    produces no
                                    resultant pleasure?

                                    <div class="entity_vote">
                                        <a href=""><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                                        <a href=""><span class="reply_ic">Reply </span></a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    @endforeach
                    <!-- media end -->
                </div>
                <!--Readers Comment-->
            </div>
            <!--Left Section-->
            @include('layouts.page_sidebar')
            <!-- Right Section -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<!-- Entity Section Wrapper -->
@endsection