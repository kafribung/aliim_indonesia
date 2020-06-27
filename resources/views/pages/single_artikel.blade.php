@extends('layouts.page_master')
@section('content')

<section id="entity_section" class="entity_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="entity_wrapper">
                    <div class="entity_title">
                        <h1>
                            <a href="#">{{$artikel->title}}</a>
                        </h1>
                    </div>
                    <!-- entity_title -->

                    <div class="entity_meta">
                        <a href="#" target="_self">{{$artikel->user->name}}</a>,
                        <a href="#" target="_self">{{$artikel->created_at->format('d-m-Y')}}</a>
                    </div>
                    <!-- entity_meta -->

                    <div class="entity_rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-full"></i>
                    </div>
                    <!-- entity_rating -->

                    <div class="entity_social">
                        <a href="#" class="icons-sm sh-ic">
                            <i class="fa fa-share-alt"></i>
                            <b>424</b> <span class="share_ic">Shares</span>
                        </a>
                        <a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
                        <!--Twitter-->
                        <a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
                        <!--Google +-->
                        <a href="#" class="icons-sm inst-ic"><i class="fa fa-instagram"> </i></a>
                    </div>
                    <!-- entity_social -->

                    <div class="entity_thumb">
                        <img class="img-responsive" src="{{ url($artikel->img) }}" title="Gambar {{$artikel->title}}" alt="Gambar {{$artikel->title}}" width="955" height="832">
                    </div>
                    <!-- entity_thumb -->

                    <div class="entity_content">
                        {!! $artikel->description !!}
                    </div>
                    <!-- entity_content -->

                    <div class="entity_footer">
                        <div class="entity_tag">
                            @foreach ($artikel->kategori_artikels as $kategori)
                                <span class="blank">{{$kategori->title}}</span>
                            @endforeach
                        </div>
                        <!-- entity_tag -->

                        <div class="entity_social">
                            <span><i class="fa fa-share-alt"></i>424 <a href="#">Shares</a> </span>
                            <span><i class="fa fa-comments-o"></i>4 <a href="#">Comments</a> </span>
                        </div>
                        <!-- entity_social -->

                    </div>
                    <!-- entity_footer -->

                </div>
                <!-- entity_wrapper -->

                <div class="related_news">
                    <div class="entity_inner__title header_purple">
                        @foreach ($artikel->kategori_artikels as $kategori)
                            <h2>Artikel {{$kategori->title}}</h2>
                        @endforeach
                    </div>
                    <!-- entity_title -->

                    <div class="row">
                        
                        @foreach ($artikel->kategori_artikels as $kategori)
                        @foreach ($kategori->artikels as $artikel)
                        <div class="col-md-6">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="{{ url($artikel->img) }}" title="Gambar {{$artikel->title}}" alt="Gambar {{$artikel->title}}" width="122" height="122"></a>
                                </div>
                                <div class="media-body">

                                    @foreach ($artikel->kategori_artikels as $kategori)
                                        <span class="tag purple">{{$kategori->title}}</span>
                                    @endforeach

                                    <h3 class="media-heading"><a href="/artikel-islam/{{$artikel->slug}}" target="_self">{{$artikel->title}}</a></h3>
                                    <span class="media-date">
                                        <a href="#">{{$artikel->created_at->format('d-m-Y')}}</a>, by: 
                                        <a href="#">{{$artikel->user->name}}</a>
                                    </span>

                                    <div class="media_social">
                                        <span><a href="#"><i class="fa fa-share-alt"></i>424</a>
                                            Shares</span>
                                        <span><a href="#"><i class="fa fa-comments-o"></i>4</a>
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
                        <form>
                            <div class="form-group comment">
                                <textarea class="form-control" id="inputComment"
                                    placeholder="Comment"></textarea>
                            </div>

                            <button type="submit" class="btn btn-submit red">Submit</button>
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

                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img alt="64x64" class="media-object"
                                    data-src="assets/img/reader_img1.jpg"
                                    src="assets/img/reader_img1.jpg" data-holder-rendered="true">
                            </a>
                        </div>
                        <div class="media-body">
                            <h2 class="media-heading"><a href="#">Sr. Ryan</a></h2>
                            But who has any right to find fault with a man who chooses to enjoy a
                            pleasure that has
                            no annoying consequences, or one who avoids a pain that produces no
                            resultant pleasure?

                            <div class="entity_vote">
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                                <a href="#"><span class="reply_ic">Reply </span></a>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img alt="64x64" class="media-object"
                                            data-src="assets/img/reader_img2.jpg"
                                            src="assets/img/reader_img2.jpg"
                                            data-holder-rendered="true">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h2 class="media-heading"><a href="#">Admin</a></h2>
                                    But who has any right to find fault with a man who chooses to enjoy
                                    a pleasure
                                    that has no annoying consequences, or one who avoids a pain that
                                    produces no
                                    resultant pleasure?

                                    <div class="entity_vote">
                                        <a href="#"><i class="fa fa-thumbs-o-up"
                                                aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-thumbs-o-down"
                                                aria-hidden="true"></i></a>
                                        <a href="#"><span class="reply_ic">Reply </span></a>
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

            <div class="col-md-4">
                {{-- Artikel Terbaru --}}
                <div class="widget">
                    <div class="widget_title widget_black">
                        <h2><a href="#">Atikel Terbaru</a></h2>
                    </div>

                    @foreach ($artikel_5 as $artikel)
                        
                        <div class="media">
                            <div class="media-left">
                                <a href="#"><img class="media-object" src="{{ url($artikel->img) }}" title="Gambar {{$artikel->title}}" alt="Gambar {{$artikel->title}}" width="122" height="122"></a>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">
                                    <a href="/artikel-islam/{{$artikel->slug}}" target="_self">{{$artikel->title}}</a>
                                </h3> 
                                <span class="media-date">
                                    <a href="#">{{$artikel->created_at->format('d-m-Y')}}</a>, by: 
                                    <a href="#">{{$artikel->user->name}}</a>
                                </span>

                                <div class="widget_article_social">
                                    <span>
                                        <a href="#" target="_self"> <i
                                                class="fa fa-share-alt"></i>424</a> Shares
                                    </span>
                                    <span>
                                        <a href="#" target="_self"><i
                                                class="fa fa-comments-o"></i>4</a> Comments
                                    </span>
                                </div>
                            </div>
                        </div>

                    @endforeach

                    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
                </div>
                {{-- END Artikel Terbaru --}}

                <!-- Iklan 1 -->

                <div class="widget hidden-xs m30">
                    <a href="{{$iklan_1->url}}" target="_blank"> <img class="img-responsive widget_img" src="{{url($iklan_1->img)}}" title="{{$iklan_1->title}}" alt="{{$iklan_1->title}}" width="200" height="100"></a>
                </div>
                <!-- End Iklan 1 -->

                {{-- Video Terbaru --}}

                <div class="widget reviews m30">
                    <div class="widget_title widget_black">
                        <h2><a href="#">Video Terbaru</a></h2>
                    </div>

                    @foreach ($video_2 as $video)
                        
                    <div class="media">
                        <div class="media-top">
                            <iframe class="media-object" src="{{$video->video}}" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="media-body">
                            <h3 class="media-heading">
                                <a href="/video-islam/{{$video->slug}}" target="_self">{{$video->title}}</a>
                            </h3> 
                            <span class="media-date">
                                <a href="#">{{$video->created_at->format('d-m-Y')}}</a>, by: 
                                <a href="#">{{$video->user->name}}</a>
                            </span>
    
                            <div class="widget_article_social">
                                <span>
                                    <a href="#" target="_self"> <i
                                            class="fa fa-share-alt"></i>424</a> Shares
                                </span>
                                <span>
                                    <a href="#" target="_self"><i
                                            class="fa fa-comments-o"></i>4</a> Comments
                                </span>
                            </div>
                        </div>
                        
                    </div>

                    @endforeach
                
                    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
                </div>
                {{-- Video Terbaru --}}

                @foreach ($iklan_2 as $iklan)
                    <div class="widget hidden-xs m30">
                        <a href="{{$iklan->url}}" target="_blank"> <img class="img-responsive widget_img" src="{{url($iklan->img)}}" title="{{$iklan->title}}" alt="{{$iklan->title}}" width="200" height="100"></a>
                    </div>
                @endforeach


            </div>
            <!-- Right Section -->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</section>
<!-- Entity Section Wrapper -->




@endsection
