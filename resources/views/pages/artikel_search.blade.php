@extends('layouts.page_master')
@section('content')

<section id="entity_section" class="entity_section">
    <div class="container">
        <div class="row">

            <div class="col-md-8">

                @forelse ($artikels as $artikel)
                <div class="entity_wrapper">
                    <div class="entity_title">
                        <h1>
                            <a href="/artikel-islam/{{$artikel->slug}}" target="_self">{{$artikel->title}}</a>
                        </h1>
                    </div>
                    <!-- entity_title -->

                    <div class="entity_meta">
                        <a href="#" target="_self">{{$artikel->user->name}}</a>,
                        <a href="#" target="_self">{{$artikel->created_at->format('d-m-Y')}}</a>
                    </div>
                    <!-- entity_meta -->

                    <div class="entity_thumb">
                        <img class="img-responsive" src="{{ url($artikel->img) }}" title="Gambar {{$artikel->title}}" alt="Gambar {{$artikel->title}}" >
                    </div>
                    <!-- entity_thumb -->

                    <div class="entity_content">
                        {!! Str::limit($artikel->description, 200)  !!}
                    </div>
                    <!-- entity_content -->

                </div>
                @empty
                <div class="entity_wrapper">
                    <div class="entity_title">
                        <h1><a href="/">Hasil tidak ditemukan kembali ke home</a></h1>
                    </div>
                    <!-- entity_title -->
                </div>
                @endforelse

                
                <!-- entity_wrapper -->

                <nav aria-label="Page navigation" class="pagination_section">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next" class="active"> <span
                                    aria-hidden="true">&raquo;</span> </a>
                        </li>
                    </ul>
                </nav>
                <!-- navigation -->

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