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
                                        <img class="lazy img-responsive" data-src="{{ url($motivasi->takeImg) }}"
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
            @include('layouts.page_sidebar')
            <!-- Right Section -->
        </div>
        <!-- Row -->
    </div>
    <!-- Container -->
</section>
<!-- END Category News Section -->


@push('after_script')
@endpush
@endsection