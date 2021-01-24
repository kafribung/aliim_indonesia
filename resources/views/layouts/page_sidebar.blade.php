<div class="col-md-4">
    {{-- Artikel Terbaru --}}
    <div class="widget">
        <div class="widget_title widget_black">
            <h2><a href="">Atikel Terbaru</a></h2>
        </div>
        @foreach ($artikelsTerbaru as $artikel)
        <div class="media">
            <div class="media-left">
                <a href="/artikel-islam/{{$artikel->slug}}">
                    <img class="lazy media-object" data-src="{{ url( $artikel->takeImg ) }}"
                        title="Gambar {{$artikel->title}}" alt="Gambar {{ $artikel->title }}" width="122"
                        height="122">
                </a>
            </div>
            <div class="media-body">
                <h1 class="media-heading">
                    <a href="/artikel-islam/{{$artikel->slug}}" target="_self">{{ $artikel->title }}</a>
                </h1>
                <span class="media-date">
                    <a href="">{{ $artikel->created_at->diffForHumans() }}</a>, by:
                    <a href="">{{ $artikel->user->name }}</a>
                </span>
                <div class="category_article_content">
                    {!! Str::limit($artikel->description, 60) !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- END Artikel Terbaru --}}

    <!-- Iklan 1 -->
    <div class="widget hidden-xs m30">
        <a href="{{ $iklan_1->link }}" target="_blank">
            <img class="lazy img-responsive widget_img" data-src="{{ url($iklan_1->takeImg) }}"
                title="{{ $iklan_1->title }}" alt="{{ $iklan_1->title }}" width="200" height="100">
        </a>
    </div>
    <!-- End Iklan 1 -->

    {{-- Iklan 2--}}
    @foreach ($iklan_2 as $iklan)
    <div class="widget hidden-xs m30">
        <a href="{{ $iklan->link }}" target="_blank">
            <img class="lazy img-responsive widget_img" data-src="{{ url($iklan->takeImg) }}"
                title="{{ $iklan->title }}" alt="{{ $iklan->title }}" width="200" height="100">
        </a>
    </div>
    @endforeach
    {{-- End Iklan 2--}}
</div>