@extends('layouts.page_master')
@section('content')

<section id="entity_section" class="entity_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="entity_wrapper">
                    <div class="entity_title">
                        <h1>{{$video->title }}</h1>
                    </div>
                    <!-- entity_title -->
                    <div class="entity_meta">
                        <a href="" target="_self">{{$video->user->name}}</a> <span>|</span>
                        <a href="" target="_self">{{$video->created_at->format('d-m-Y')}}</a>
                    </div>
                    <!-- entity_meta -->
                    <div class="entity_social">
                        <!--Fb-->
                        <a target="_blank" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}"><i class="fa fa-facebook"></i></a>
                        <!--Twitter-->
                        <a target="_blank" rel="nofollow" href="https://twitter.com/intent/tweet?text={{ request()->fullUrl() }}"><i class="fa fa-twitter"></i></a>
                        <!--WA-->
                        <a target="_blank" href="https://api.whatsapp.com/send?text={{ request()->fullUrl() }}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"> </i></a>
                    </div>
                    <!-- entity_social -->
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="{{ $video->video }}?rel=0"></iframe>
                    </div>
                    <!-- embed-responsive -->
                    <div class="entity_content">
                        {!! $video->description !!}
                    </div>
                    <!-- entity_content -->
                    <div class="entity_footer">
                        <div class="entity_tag">
                            @foreach ($video->kategori_videos as $kategori)
                            <span class="blank">{{ $kategori->title }}</span>
                            @endforeach
                        </div>
                        <!-- entity_tag -->
                        <div class="entity_social">
                            <span><i class="fa fa-eye"></i>{{ $video->view }} Orang</span>
                            <span><i class="fa fa-comments-o"></i>{{ $video->comments->count() }} Komentar</span>
                        </div>
                        <!-- entity_social -->
                    </div>
                    <!-- entity_footer -->
                </div>
                <!-- entity_wrapper -->

                <div class="related_news">
                    <div class="entity_inner__title header_purple">
                        <h2>Video Lainnya</h2>
                    </div>
                    <!-- entity_title -->
                    <div class="row">
                        @foreach ($video->kategori_videos as $kategori)
                        @foreach ($kategori->videos()->limit(3)->get() as $video)
                        <div class="col-md-6">
                            <div class="media">
                                <div class="media-top">
                                    <iframe class="media-object" src="{{ $video->video }}?controls=0&rel=0" frameborder="0"></iframe>
                                </div>
                                <div class="media-body">
                                    @foreach ($video->kategori_videos as $kategori)
                                    <span class="tag purple">{{ $kategori->title }}</span>
                                    @endforeach
                                    <h3 class="media-heading">
                                        <a href="/video-islam/{{ $video->slug }}" target="_self">{{ $video->title }}</a>
                                    </h3>
                                    <span class="media-date">
                                        <a href="">{{ $video->created_at->diffForHumans()}}</a>, by:
                                        <a href="">{{$video->user->name}}</a>
                                    </span>
                                    <div class="media_social">
                                        <span><i class="fa fa-share-alt"></i>{{ $video->view }} Orang</span>
                                        <span><i class="fa fa-comments-o"></i>{{ $video->comments->count() }} Komentar</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
                <!-- Related news -->

                <div class="readers_comment">
                    <div class="entity_inner__title header_purple">
                        <h2>Komentar</h2>
                    </div>
                    @comments(['model' => $video])
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