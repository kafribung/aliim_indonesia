@extends('layouts.page_master')
@section('content')

<!-- Category News Section -->
<section id="category_section" class="category_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- galeri -->
                <div class="category_section camera">
                    <div class="article_title header_orange">
                        <h2><a href="" target="_self">Galeri</a></h2>
                    </div>
                    <!-- article_title -->
                    <div class="category_article_wrapper">
                        <div class="row">
                            <div  id="lightgallery">
                                @foreach ($galeris as $galeri)
                                    <a class="col-md-6 top_article_img" href="{{ url($galeri->takeImg) }}">
                                        <img class="lazy img-responsive" data-src="{{ url($galeri->takeImg) }}" alt="feature-top"
                                            width="400" height="200">
                                    </a>
                                @endforeach
                                <!-- col-md-7 -->
                            </div>
                            <!-- row -->
                        </div>
                    </div>
                </div>
                <!-- galeri -->
            </div>
            <!-- Left Section -->
            @include('layouts.page_sidebar')
            <!-- Right Section -->
        </div>
        <!-- Row -->
    </div>
    <!-- Container -->
</section>
<!-- END Category News Section -->
@push('after_script')
<script type="text/javascript">
    lightGallery(document.getElementById('lightgallery')); 
</script>
@endpush
@endsection