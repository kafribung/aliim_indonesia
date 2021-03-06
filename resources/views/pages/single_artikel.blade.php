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
                    <div class="entity_social">
                        <!--Fb-->
                        <a target="_blank" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}"><i class="fa fa-facebook"></i></a>
                        <!--Twitter-->
                        <a target="_blank" rel="nofollow" href="https://twitter.com/intent/tweet?text={{ request()->fullUrl() }}"><i class="fa fa-twitter"></i></a>
                        <!--WA-->
                        <a target="_blank" href="https://api.whatsapp.com/send?text={{ request()->fullUrl() }}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"> </i></a>
                    </div>
                    <!-- entity_social -->
                    <div class="entity_thumb">
                        <img class="lazy img-responsive" data-src="{{ url($artikel->takeImg) }}" title="Gambar {{ $artikel->title }}" alt="Gambar {{ $artikel->title }}" width="955" height="832">
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
                            <span><i class="fa fa-eye"></i>{{ $artikel->view }} Mata</span>
                            <span><i class="fa fa-comments-o"></i>{{ $artikel->comments->count() }} Komentar</span>
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
                        {{-- Variabel artikel change in artikelList sebab di bawah variabel artikel mau di passing --}}
                        @foreach ($kategori->artikels()->limit(3)->get() as $artikelList)
                        <div class="col-md-6">
                            <div class="media">
                                <div class="media-left">
                                    <a href="/artikel-islam/{{ $artikelList->slug }}">
                                        <img class="lazy media-object" data-src="{{ url($artikelList->takeImg) }}" title="Gambar {{ $artikelList->title }}" alt="Gambar {{ $artikelList->title }}" width="122" height="122">
                                    </a>
                                </div>
                                <div class="media-body">
                                    @foreach ($artikelList->kategori_artikels as $kategori)
                                    <span class="tag purple">{{ $kategori->title }}</span>
                                    @endforeach
                                    <h3 class="media-heading">
                                        <a href="/artikel-islam/{{ $artikelList->slug }}" target="_self">{{ $artikelList->title }}</a>
                                    </h3>
                                    <span class="media-date">
                                        <a href="">{{ $artikelList->created_at->diffForHumans() }}</a>, by:
                                        <a href="">{{$artikelList->user->name}}</a>
                                    </span>
                                    <div class="media_social">
                                        <span><i class="fa fa-eye"></i>{{ $artikelList->view }} Mata</span>
                                        <span><i class="fa fa-comments-o"></i>{{ $artikelList->comments->count() }} Komentar</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>
                {{-- Komentar --}}
                <!-- Related news -->
                <div class="readers_comment">
                    <div class="entity_inner__title header_purple">
                        <h2>Komentar</h2>
                    </div>
                    @comments([
                        'model' => $artikel,
                    ])
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
@push('after_script')
    <script>
        $(function(){
            setTimeout(loadajax(),10000);
        });
        function loadajax() {
            const data = (parseInt({{ $artikel->view }}) +  1)
            $.ajax({
                type: "PATCH",
                url: "/api/artikel-islam/" + {{ $artikel->id }},
                data: { 
                    "_token": "{{ csrf_token() }}", 
                    "view"  : data
                },
            });
        }
    </script>
@endpush
@endsection
