@extends('layouts.page_master')
@section('content')

<!-- Category News Section -->
<section id="category_section" class="category_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

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
                                <div class="top_article_img myBtn">
                                    <a>
                                        <img class=" img-responsive" src="{{ url($motivasi->takeImg) }}"
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
                </div>
                <!-- Motivasi -->
            </div>
            <!-- Left Section -->

            <div class="col-md-4">
                {{-- Artikel Terbaru --}}
                <div class="widget">
                    <div class="widget_title widget_black">
                        <h2><a href="#">Atikel Terbaru</a></h2>
                    </div>
                    @foreach ($artikel_5 as $artikel)
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="{{ url( $artikel->takeImg ) }}"
                                    title="Gambar {{$artikel->title}}" alt="Gambar {{ $artikel->title }}" width="122"
                                    height="122"></a>
                        </div>
                        <div class="media-body">
                            <h1 class="media-heading">
                                <a href="/artikel-islam/{{$artikel->slug}}" target="_self">{{ $artikel->title }}</a>
                            </h1>
                            <span class="media-date">
                                <a href="#">{{ $artikel->created_at->diffForHumans() }}</a>, by:
                                <a href="#">{{ $artikel->user->name }}</a>
                            </span>
                            <div class="widget_article_social">
                                <span>
                                    <a href="#" target="_self"> <i class="fa fa-share-alt"></i>424</a> Shares
                                </span>
                                <span>
                                    <a href="#" target="_self"><i class="fa fa-comments-o"></i>4</a> Comments
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- END Artikel Terbaru --}}

                <!-- Iklan 1 -->
                <div class="widget hidden-xs m30">
                    <a href="{{ $iklan_1->link }}" target="_blank">
                        <img class="img-responsive widget_img" src="{{ url($iklan_1->takeImg) }}"
                            title="{{ $iklan_1->title }}" alt="{{ $iklan_1->title }}" width="200" height="100">
                    </a>
                </div>
                <!-- End Iklan 1 -->

                {{-- Video Terbaru --}}
                <div class="widget reviews m30">
                    <div class="widget_title widget_black">
                        <h2><a href="#">Video Terbaru</a></h2>
                    </div>
                    @foreach ($video_2 as $video)
                    <div class="media">
                        <div class="media-left">
                            <iframe class="media-object" src="{{ $video->video }}" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="media-body">
                        <h1 class="media-heading">
                            <a href="/video-islam/{{ $video->slug }}" target="_self">{{ $video->title }}</a>
                        </h1>
                        <span class="media-date">
                            <a href="#">{{ $video->created_at->diffForHumans() }}</a>, by:
                            <a href="#">{{ $video->user->name }}</a>
                        </span>
                        <div class="widget_article_social">
                            <span>
                                <a href="#" target="_self"> <i class="fa fa-share-alt"></i>424</a> Shares
                            </span>
                            <span>
                                <a href="#" target="_self"><i class="fa fa-comments-o"></i>4</a> Comments
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Right Section -->
        </div>
        <!-- Row -->
    </div>
    <!-- Container -->
</section>
<!-- END Category News Section -->

<!-- Trigger/Open The Modal -->
<button class="btn btn-dark" id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
    </div>

</div>

@push('after_css')
<style>
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>
@endpush

@push('after_script')
<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementsByClassName("myBtn");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>
@endpush
@endsection