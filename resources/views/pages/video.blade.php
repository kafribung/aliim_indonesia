@extends('layouts.page_master')
@section('content')

<section id="entity_section" class="entity_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach ($videos as $video)
                <div class="entity_wrapper">
                    <div class="entity_title">
                        <h1>
                            <a href="/video-islam/{{ $video->slug }}" target="_self">{{ $video->title }}</a>
                        </h1>
                    </div>
                    <!-- entity_title -->
                    <div class="entity_meta">
                        <a href="" target="_self">{{ $video->user->name }}</a> <span>|</span>
                        <a href="" target="_self">{{ $video->created_at->diffForHumans() }}</a>
                    </div>
                    <!-- entity_meta -->
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" width="300" src="{{ $video->video }}"></iframe>
                    </div>
                    <!-- embed-responsive -->
                    <div class="entity_content">
                        {!! Str::limit($video->description, 500) !!}
                    </div>
                    <!-- entity_content -->
                </div>
                @endforeach
                <!-- entity_wrapper -->
                <nav aria-label="Page navigation" class="pagination_section">
                    {{ $videos->links() }}
                </nav>
                <!-- navigation -->
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