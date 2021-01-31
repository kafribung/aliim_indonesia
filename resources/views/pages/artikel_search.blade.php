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
                            <a href="/artikel-islam/{{ $artikel->slug }}" target="_self">{{ $artikel->title }}</a>
                        </h1>
                    </div>
                    <!-- entity_title -->
                    <div class="entity_meta">
                        <a href="" target="_self">{{ $artikel->user->name }}</a> <span>|</span>
                        <a href="" target="_self">{{ $artikel->created_at->diffForHumans() }}</a>
                    </div>
                    <!-- entity_meta -->
                    <div class="entity_thumb">
                        <a href="/artikel-islam/{{ $artikel->slug }}" target="_self">
                            <img class="lazy img-responsive" data-src="{{ url($artikel->takeImg) }}"
                                title="Gambar {{ $artikel->title }}" alt="Gambar {{ $artikel->title }}">
                        </a>
                    </div>
                    <!-- entity_thumb -->
                    <div class="entity_content">
                        {!! Str::limit($artikel->description, 500) !!}
                    </div>
                    <!-- entity_content -->
                </div>
                @empty
                <div class="entity_wrapper">
                    <div class="entity_title">
                        <h1>
                            <a href="/" target="_self">Artikel tidak ditemukan</a>
                        </h1>
                    </div>
                    <!-- entity_title -->
                </div>
                @endforelse
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