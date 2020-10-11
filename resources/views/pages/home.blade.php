@extends('layouts.page_master')
@section('content')
{{-- Hero --}}
<section id="feature_news_section" class="feature_news_section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="feature_article_wrapper">
                    <div class="feature_article_img">
                        <img class="lazy img-responsive top_static_article_img" src="{{ url($heroFirst->takeImg) }}"
                            title="Gambar {{$heroFirst->title}}" alt="Gambar {{$heroFirst->title}}" width="832px"
                            height="955px">
                    </div>
                    <!-- feature_article_img -->

                    <!-- Hot News -->
                    <div class="feature_article_inner">
                        <div class="tag_lg red"><a href="/">Baru Upload</a></div>
                        <div class="feature_article_title">
                            <h1>
                                <a href="/artikel-islam/{{ $heroFirst->slug }}"
                                    target="_self">{{ $heroFirst->title }}</a>
                            </h1>
                        </div>
                        <!-- feature_article_title -->
                        <div class="feature_article_date">
                            <a href="" target="_self">{{ $heroFirst->user->name }}</a>,
                            <a href="" target="_self">{{ $heroFirst->created_at->diffForHumans() }}</a>
                        </div>
                        <!-- feature_article_date -->
                        <div class="feature_article_content">
                            {!! Str::limit($heroFirst->description, 200) !!}
                        </div>
                        <!-- feature_article_content -->
                    </div>
                    <!-- Hot News -->
                </div>
                <!-- feature_article_wrapper -->
            </div>
            <!-- col-md-7 -->

            {{-- Top Viewd --}}
            @foreach ($heroTwo as $artikel)
            <div class="col-md-5" style="margin-bottom: 20px">
                <div class="feature_static_wrapper">
                    <div class="feature_article_img">
                        <img class="lazy img-responsive" src="{{ url($artikel->takeImg)}}" alt="feature-top"
                            title="Gambar {{$artikel->tttle}}" alt="Gambar {{$artikel->title}}" width="670" height=395">
                    </div>
                    <!-- feature_article_img -->
                    <div class="feature_article_inner">
                        <div class="tag_lg purple"><a href="">Populer</a></div>
                        <div class="feature_article_title">
                            <h1>
                                <a href="/artikel-islam/{{$artikel->slug}}" target="_self">{{$artikel->title}} </a>
                            </h1>
                        </div>
                        <!-- feature_article_title -->
                        <div class="feature_article_date">
                            <a href="" target="_self">{{$artikel->user->name}}</a>,
                            <a href="" target="_self">{{$artikel->created_at->diffForHumans()}}</a>
                        </div>
                        <!-- feature_article_date -->
                        <div class="feature_article_content">
                            {!! Str::limit($artikel->description, 100) !!}
                        </div>
                        <!-- feature_article_content -->
                    </div>
                    <!-- feature_article_inner -->
                </div>
                <!-- feature_static_wrapper -->
            </div>
            @endforeach
            {{-- Top Viewd --}}
        </div>
        <!-- Row -->
    </div>
    <!-- container -->
</section>
<!--END HERO -->

<!-- Category News Section -->
<section id="category_section" class="category_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- Artikel Belajar Islam -->

                @if (session('status'))
                <p class="alert alert-info">{{ session('status') }}</p>
                @endif

                <div class="category_section mobile">
                    <div class="article_title header_purple">
                        <h2><a href="" target="_self">Belajar Islam</a></h2>
                    </div>
                    <!----article_title------>
                    <div class="category_article_wrapper">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="top_article_img">
                                    <a href="" target="_self">
                                        <img class="lazy img-responsive" data-src="{{ url($artikel->takeImg) }}"
                                            title="Gambar {{$artikel->title}}" alt="Gambar {{$artikel->title}}"
                                            width="500" height="400">
                                    </a>
                                </div>
                                <!----top_article_img------>
                            </div>
                            <div class="col-md-6">
                                @foreach ($artikel->kategori_artikels as $kategori)
                                <span class="tag purple">{{$kategori->title}}</span>
                                @endforeach
                                <div class="category_article_title">
                                    <h2>
                                        <a href="/artikel-islam/{{$artikel->slug}}"
                                            target="_self">{{$artikel->title}}</a>
                                    </h2>
                                </div>
                                <!----category_article_title------>
                                <div class="category_article_date">
                                    <a href="">{{$artikel->created_at->diffForHumans()}}</a>, by:
                                    <a href="">{{$artikel->user->name}}</a></div>
                                <!----category_article_date------>
                                <div class="category_article_content">
                                    {!! Str::limit($artikel->description, 200) !!}
                                </div>
                                <!----category_article_content------>
                            </div>
                        </div>
                    </div>
                    {{-- Artikel Collenction  --}}
                    <div class="category_article_wrapper">
                        <div class="row">
                            @foreach ($artikels as $artikel)
                            <div class="col-md-6 mb-3">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="">
                                            <img class="lazy media-object" data-src="{{ url($artikel->takeImg) }}"
                                                title="Gambar {{$artikel->title}}" alt="Gambar {{$artikel->title}}"
                                                width="100" height="100">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        @foreach ($artikel->kategori_artikels as $kategori)
                                        <span class="tag purple">{{$kategori->title}}</span>
                                        @endforeach
                                        <h3 class="media-heading">
                                            <a href="/artikel-islam/{{$artikel->slug}}"
                                                target="_self">{{$artikel->title}}</a>
                                        </h3>
                                        <span class="media-date">
                                            <a href="">{{$artikel->created_at->diffForHumans()}}</a>, by:
                                            <a href="">{{$artikel->user->name}}</a>
                                        </span>
                                        <div class="category_article_content">
                                            {!! Str::limit($artikel->description, 60) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- End Artikel Belajar Islam -->

                <!-- Video News Section -->
                <div class="category_section design">
                    <div class="article_title header_blue">
                        <h2><a href="" target="_self">Video</a></h2>
                    </div>
                    <!-- row -->
                    <div class="category_article_wrapper">
                        <div class="row">
                            @foreach ($videos as $video)
                            <div class="col-md-6">
                                <div class="category_article_body">
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <iframe class="lazy embed-responsive-item" src="{{ $video->video }}" frameborder="0"
                                            allowfullscreen></iframe>
                                    </div>
                                    <!-- top_article_img -->
                                    @foreach ($video->kategori_videos as $kategori)
                                    <span class="tag blue"><a href="" target="_self">{{ $kategori->title }}</a></span>
                                    @endforeach
                                    <div class="category_article_title">
                                        <h2>
                                            <a href="/video-islam/{{ $video->slug }}"
                                                target="_self">{{ $video->title }}</a>
                                        </h2>
                                    </div>
                                    <!-- category_article_title -->
                                    <div class="category_article_date">
                                        <a href="">{{ $video->created_at->diffForHumans() }}</a>, by:
                                        <a href="">{{ $video->user->name }}</a>
                                    </div>
                                    <!-- category_article_date -->
                                    <div class="category_article_content">
                                        {!! Str::limit($video->description, 100) !!}
                                    </div>
                                    <!-- category_article_content -->
                                </div>
                                <!-- category_article_body -->
                            </div>
                            <!-- col-md-6 -->
                            @endforeach
                        </div>
                        <!-- row -->
                    </div>
                </div>
                <!-- End Video News Section -->

                <!-- Motivasi -->
                <div class="category_section camera">
                    <div class="article_title header_orange">
                        <h2><a href="" target="_self">Motivasi</a></h2>
                    </div>
                    <!-- article_title -->
                    <div class="category_article_wrapper">
                        <div class="row">
                            @foreach ($motivasis as $motivasi)
                            <div class="col-md-6">
                                <div class="top_article_img">
                                    <a href="/motivasi" target="_self">
                                        <img class="lazy img-responsive" data-src="{{ url($motivasi->takeImg) }}"
                                            alt="feature-top" width="400" height="200">
                                    </a>
                                </div>
                                <!-- top_article_img -->
                            </div>
                            @endforeach
                            <!-- col-md-7 -->
                        </div>
                        <!-- row -->
                    </div>
                    <!-- category_article_wrapper -->
                </div>
                <!-- Motivasi -->
            </div>
            <!-- Left Section -->
            @include('layouts.page_sidebar')
            <!-- Right Section -->
        </div>
        <!-- Row -->
    </div>
    <!-- Container -->
</section>
<!-- END Category News Section -->
@endsection