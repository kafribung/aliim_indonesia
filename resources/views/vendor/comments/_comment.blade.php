@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))

@if(isset($reply) && $reply === true)
  <div id="comment-{{ $comment->getKey() }}" class="media">
@else
  <li id="comment-{{ $comment->getKey() }}" class="media">
@endif
    {{-- Image --}}
    <div class="media-left">
        <img class="media-object" data-holder-rendered="true" src="{{ $comment->commenter->takeImg }}" width="50" height="50">
    </div>
    <div class="media-body">
        <h2 class="media-heading">{{ $comment->commenter->name ?? $comment->guest_name }} <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small></h2>
        <div style="white-space: pre-wrap;">{!! $markdown->line($comment->comment) !!}</div>
        <div class="entity_vote">
            @can('reply-to-comment', $comment)
                <a data-toggle="modal" data-backdrop="false" data-target="#reply-modal-{{ $comment->getKey() }}"><i class="fa fa-reply" aria-hidden="true"></i></a>
            @endcan
            @can('edit-comment', $comment)
                <a  data-toggle="modal" data-backdrop="false" data-target="#comment-modal-{{ $comment->getKey() }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
            @endcan
            @can('delete-comment', $comment)
                <a href="{{ route('comments.destroy', $comment->getKey()) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->getKey() }}').submit();"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <form id="comment-delete-form-{{ $comment->getKey() }}" action="{{ route('comments.destroy', $comment->getKey()) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            @endcan
        </div>

        {{-- Modal Edit --}}
        @can('edit-comment', $comment)
        {{-- tabindex="-1" role="dialog" --}}
            <div class="modal fade" id="comment-modal-{{ $comment->getKey() }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.update', $comment->getKey()) }}">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Komentar</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Perbarui pesan anda di sini:</label>
                                    <textarea required class="form-control" name="message" rows="3">{{ $comment->comment }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger text-uppercase" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-sm btn-success text-uppercase">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        {{-- Modal Reply --}}
        @can('reply-to-comment', $comment)
            <div class="modal fade" id="reply-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.reply', $comment->getKey()) }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Balas Komentar</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Masukkan komentar anda di sini:</label>
                                    <textarea required class="form-control" name="message" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger text-uppercase" data-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-sm btn-success text-uppercase">Balas</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
        <br />{{-- Margin bottom --}}
        
        {{-- Recursion for children --}}
        @if($grouped_comments->has($comment->getKey()))
            @foreach($grouped_comments[$comment->getKey()] as $child)
                @include('comments::_comment', [
                    'comment' => $child,
                    'reply' => true,
                    'grouped_comments' => $grouped_comments
                ])
            @endforeach
        @endif

    </div>
@if(isset($reply) && $reply === true)
  </div>
@else
  </li>
@endif