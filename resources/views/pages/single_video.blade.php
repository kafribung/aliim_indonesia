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
                        <a href="" target="_self">{{$video->created_at->diffForHumans()}}</a>
                    </div>
                    <!-- entity_meta -->
                    <div class="entity_social">
                        <div class="sharethis-inline-share-buttons"></div>
                    </div>
                    <!-- entity_social -->
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="{{ $video->video }}"></iframe>
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
                        <h2>Video Lainnya</h2>
                    </div>
                    <!-- entity_title -->
                    <div class="row">
                        @foreach ($video->kategori_videos as $kategori)
                        @foreach ($kategori->videos()->limit(3)->get() as $video)
                        <div class="col-md-6">
                            <div class="media">
                                <div class="media-top">
                                    <iframe class="media-object" src="{{ $video->video }}" frameborder="0"
                                        allowfullscreen></iframe>
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
                        <div class="entity_comment_from">
                            <form action="/komentar-artikel/{{ $video->id }}" method="POST">
                                @csrf
                                <div class="form-group comment">
                                    <textarea class="form-control" id="inputComment" placeholder="Comment"></textarea>
                                </div>

                                <button type="submit" class="btn btn-submit green float-right">Komentar</button>
                            </form>
                        </div>
                    </div>
                    <!--Entity Comments From -->

                </div>
                <!--Entity Comments -->


                <div class="readers_comment">
                    <div class="entity_inner__title header_purple">
                        <h2>Baca Komentar</h2>
                    </div>
                    <!-- entity_title -->

                    <div class="media">
                        <div class="media-left">
                            <a href="">
                                <img alt="64x64" class="media-object" data-src="assets/img/reader_img1.jpg"
                                    src="assets/img/reader_img1.jpg" data-holder-rendered="true">
                            </a>
                        </div>
                        <div class="media-body">
                            <h2 class="media-heading"><a href="">Sr. Ryan</a></h2>
                            But who has any right to find fault with a man who chooses to enjoy a
                            pleasure that has
                            no annoying consequences, or one who avoids a pain that produces no
                            resultant pleasure?

                            <div class="entity_vote">
                                <a href=""><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                                <a href=""><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                                <a href=""><span class="reply_ic">Reply </span></a>
                            </div>
                            <div class="media">
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
                            </div>
                        </div>
                    </div>
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