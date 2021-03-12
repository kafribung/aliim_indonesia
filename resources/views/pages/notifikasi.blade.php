@extends('layouts.page_master')
@section('content')

<section id="entity_section" class="entity_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="entity_wrapper">
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action active disabled" aria-current="true">List Komentrar </a>
                        @forelse ($notifications as $notification)
                        <a href="/artikel-islam/{{ $notification->artikel->slug }}/#comment-{{ $notification->comment_id }}" class="list-group-item list-group-item-action">{{ $notification->description }}</a>
                        @empty
                        <a href="#" class="list-group-item list-group-item-action">Komentrar belum ada</a>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<!-- Entity Section Wrapper -->
@endsection