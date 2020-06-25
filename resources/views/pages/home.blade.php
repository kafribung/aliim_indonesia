 @extends('layouts.page_master')
 @section('content')
     {{-- Hero --}}
 <section id="feature_news_section" class="feature_news_section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="feature_article_wrapper">
                    <div class="feature_article_img">
                        <img class="img-responsive top_static_article_img" src="{{ url($artikel_1->img) }}" title="Gambar {{$artikel_1->tittle}}" alt="feature-top" width="955" height="832">
                    </div>
                    <!-- feature_article_img -->

                    {{-- Hot News --}}
                    <div class="feature_article_inner">
                        <div class="tag_lg red"><a href="category.html">Hot News</a></div>
                        <div class="feature_article_title">
                            <h1>
                                <a href="#" target="_self">{{$artikel_1->title}}</a>
                            </h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date">
                            <a href="#" target="_self">{{$artikel_1->user->name}}</a>,
                            <a href="#" target="_self">{{$artikel_1->created_at->format('d-m-Y')}}</a>
                        </div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                            {!! Str::limit($artikel_1->description, 200);  !!}
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            <span><i class="fa fa-share-alt"></i><a href="#">424</a>Shares</span>
                            <span><i class="fa fa-comments-o"></i><a href="#">4</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    {{-- END Hot News --}}

                </div>
                <!-- feature_article_wrapper -->

            </div>
            <!-- col-md-7 -->

            {{-- Top Viewd --}}
            @foreach ($artikel_2 as $artikel)
            <div class="col-md-5">
                <div class="feature_static_wrapper">
                    <div class="feature_article_img">
                        <img class="img-responsive" src="{{ url($artikel->img)}}" alt="feature-top" title="Gambar {{$artikel->tttle}}" alt="Gambar {{$artikel->title}}" width="500" height="400">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg purple"><a href="category.html">Top Viewed</a></div>
                        <div class="feature_article_title">
                            <h1>
                                <a href="#" target="_self">{{$artikel->title}} </a>
                            </h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date">
                            <a href="#" target="_self">{{$artikel->user->name}}</a>,
                            <a href="#" target="_self">{{$artikel->created_at->format('d-m-Y')}}</a>
                        </div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                            {!! Str::limit($artikel->description, 200);  !!}
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            <span><i class="fa fa-share-alt"></i><a href="#">424</a>Shares</span>
                            <span><i class="fa fa-comments-o"></i><a href="#">4</a>Comments</span>
                        </div>
                        <!-- article_social -->

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
                <div class="category_section mobile">
                    <div class="article_title header_purple">
                        <h2><a href="category.html" target="_self">Belajar Islam</a></h2>
                    </div>
                    <!----article_title------>
                    <div class="category_article_wrapper">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="top_article_img">
                                    <a href="#" target="_self">
                                        <img class="img-responsive" src="{{ url($artikel_3->img) }}" title="Gambar {{$artikel_3->title}}" alt="Gambar {{$artikel_3->title}}" width="500" height="400">
                                    </a>
                                </div>
                                <!----top_article_img------>
                            </div>

                            <div class="col-md-6">
                                @foreach ($artikel_3->kategori_artikels as $kategori)
                                    <span class="tag purple">{{$kategori->title}}</span>
                                @endforeach

                                <div class="category_article_title">
                                    <h2>
                                        <a href="#" target="_self">{{$artikel_3->title}}</a>
                                    </h2>
                                </div>
                                <!----category_article_title------>
                                <div class="category_article_date">
                                    <a href="#">{{$artikel_3->created_at->format('d-m-Y')}}</a>, by: 
                                    <a href="#">{{$artikel_3->user->name}}</a></div>
                                <!----category_article_date------>
                                <div class="category_article_content">
                                    {!! Str::limit($artikel_3->description, 200);  !!}
                                </div>
                                <!----category_article_content------>
                                <div class="media_social">
                                    <span><a href="#"><i class="fa fa-share-alt"></i>424 </a>
                                        Shares</span>
                                    <span><i class="fa fa-comments-o"></i><a href="#">4</a>
                                        Comments</span>
                                </div>
                                <!----media_social------>
                            </div>
                        </div>
                    </div>
                    <div class="category_article_wrapper">
                        <div class="row">

                            @foreach ($artikel_4 as $artikel)
                                
                            <div class="col-md-6 mb-3">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object" src="{{ url($artikel->img) }}" title="Gambar {{$artikel->title}}" alt="Gambar {{$artikel->title}}" width="100" height="100">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        @foreach ($artikel->kategori_artikels as $kategori)
                                            <span class="tag purple">{{$kategori->title}}</span>
                                        @endforeach

                                        <h3 class="media-heading">
                                            <a href="#" target="_self">{{$artikel->title}}</a>
                                        </h3>
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

                        </div>
                    </div>
                    <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
                </div>
                <!-- End Artikel Belajar Islam -->

                
                <!-- Video News Section -->
                <div class="category_section design">
                    <div class="article_title header_blue">
                        <h2><a href="category.html" target="_self">Video</a></h2>
                    </div>
                    <!-- row -->

                    <div class="category_article_wrapper">
                        <div class="row">

                            @foreach ($video_1 as $video)
                                
                            <div class="col-md-6">
                                <div class="category_article_body">

                                    <div class="embed-responsive embed-responsive-4by3">
                                        <iframe class="embed-responsive-item" src="{{$video->video}}" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                    <!-- top_article_img -->

                                    @foreach ($video->kategori_videos as $kategori)
                                        <span class="tag blue"><a href="#" target="_self">{{$kategori->title}}</a></span>
                                    @endforeach

                                    <div class="category_article_title">
                                        <h2>
                                            <a href="#" target="_self">{{$video->title}}</a>
                                        </h2>
                                    </div>
                                    <!-- category_article_title -->

                                    <div class="category_article_date">
                                        <a href="#">{{$video->created_at->format('d-m-Y')}}</a>, by: 
                                        <a href="#">{{$video->user->name}}</a>
                                    </div>
                                    <!----category_article_date------>
                                    <!-- category_article_date -->

                                    <div class="category_article_content">
                                        {!! Str::limit($video->description, 200);  !!}
                                    </div>
                                    <!-- category_article_content -->

                                    <div class="media_social">
                                        <span><a href="#"><i class="fa fa-share-alt"></i>424 </a>
                                            Shares</span>
                                        <span><i class="fa fa-comments-o"></i><a href="#">4</a>
                                            Comments</span>
                                    </div>
                                    <!-- media_social -->

                                </div>
                                <!-- category_article_body -->

                            </div>
                            <!-- col-md-6 -->
                            @endforeach
                        </div>
                        <!-- row -->

                    </div>
                  
                    <!-- top_article_img -->

                    <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
                </div>
                <!-- End Video News Section -->



                <!-- Doa Harian -->
                <div class="category_section camera">
                    <div class="article_title header_orange">
                        <h2><a href="category.html" target="_self">Doa Harian</a></h2>
                    </div>
                    <!-- article_title -->

                        
                    <div class="category_article_wrapper">
                        <div class="row">
                    @foreach ($motivasis as $motivasi)

                            <div class="col-md-6">
                                <div class="top_article_img">
                                    <a href="#" target="_self">
                                        <img class="img-responsive" src="{{url($motivasi->img)}}" alt="feature-top" width="400" height="200">
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

                
                    <!-- category_article_wrapper -->

                    <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
                </div>
                <!-- Doa Harian -->
            </div>
            <!-- Left Section -->

            <div class="col-md-4">
                {{-- Artikel Terbaru --}}
                <div class="widget">
                    <div class="widget_title widget_black">
                        <h2><a href="#">Atikel Terbaruuu</a></h2>
                    </div>

                    @foreach ($artikel_5 as $artikel)
                        
                        <div class="media">
                            <div class="media-left">
                                <a href="#"><img class="media-object" src="assets/img/pop_right1.jpg" alt="Generic placeholder image"></a>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">
                                    <a href="#" target="_self">{{$artikel->title}}</a>
                                </h3> 
                                <span class="media-date"><a href="#">10Aug- 2015</a>, by: <a
                                        href="#">Eric joan</a></span>

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

                <div class="widget hidden-xs m30">
                    <img class="img-responsive widget_img" src="assets/img/right_add5.jpg" alt="add_one">
                </div>
                <!-- Advertisement -->

                {{-- Video Terbaru --}}

                <div class="widget reviews m30">
                    <div class="widget_title widget_black">
                        <h2><a href="#">Video Terbaru</a></h2>
                    </div>

                    @foreach ($video_2 as $video)
                        
                    <div class="media">
                        <div class="media-left">
                            <iframe class="media-object" src="{{$video->video}}" frameborder="0" allowfullscreen></iframe>
                        </div>
                        
                    </div>

                    @endforeach

                  
                    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
                </div>
                {{-- Video Terbaru --}}

                <div class="widget hidden-xs m30">
                    <img class="img-responsive widget_img" src="assets/img/right_add6.jpg" alt="add_one">
                </div>
                <!-- Advertisement -->

                <div class="widget hidden-xs m30">
                    <img class="img-responsive widget_img" src="assets/img/right_add6.jpg" alt="add_one">
                </div>
                <!-- Advertisement -->

          


            </div>
            <!-- Right Section -->

        </div>
        <!-- Row -->

    </div>
    <!-- Container -->

</section>
<!-- END Category News Section -->
@endsection
