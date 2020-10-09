<div class="col-md-4">
    {{-- Artikel Terbaru --}}
    <div class="widget">
        <div class="widget_title widget_black">
            <h2><a href="">Atikel Terbaru</a></h2>
        </div>
        @foreach ($artikelsTerbaru as $artikel)
        <div class="media">
            <div class="media-left">
                <a href=""><img class="media-object" src="{{ url( $artikel->takeImg ) }}"
                        title="Gambar {{$artikel->title}}" alt="Gambar {{ $artikel->title }}" width="122"
                        height="122"></a>
            </div>
            <div class="media-body">
                <h1 class="media-heading">
                    <a href="/artikel-islam/{{$artikel->slug}}" target="_self">{{ $artikel->title }}</a>
                </h1>
                <span class="media-date">
                    <a href="">{{ $artikel->created_at->diffForHumans() }}</a>, by:
                    <a href="">{{ $artikel->user->name }}</a>
                </span>

                <div class="widget_article_social">
                    <span>
                        <a href="" target="_self"> <i class="fa fa-share-alt"></i>424</a> Shares
                    </span>
                    <span>
                        <a href="" target="_self"><i class="fa fa-comments-o"></i>4</a> Comments
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
            <h2><a href="">Video Terbaru</a></h2>
        </div>
        @foreach ($videosTerbaru as $video)
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
                <a href="">{{ $video->created_at->diffForHumans() }}</a>, by:
                <a href="">{{ $video->user->name }}</a>
            </span>

            <div class="widget_article_social">
                <span>
                    <a href="" target="_self"> <i class="fa fa-share-alt"></i>424</a> Shares
                </span>
                <span>
                    <a href="" target="_self"><i class="fa fa-comments-o"></i>4</a> Comments
                </span>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Iklan 2--}}
    @foreach ($iklan_2 as $iklan)
    <div class="widget hidden-xs m30">
        <a href="{{ $iklan->link }}" target="_blank">
            <img class="img-responsive widget_img" src="{{ url($iklan->takeImg) }}"
                title="{{ $iklan->title }}" alt="{{ $iklan->title }}" width="200" height="100">
        </a>
    </div>
    @endforeach
</div>