@foreach($comments as $comment)

<div class="{{ $comment->parent_id ? 'ms-5' : '' }}">
    <div class="mb-2">

        <div class="d-flex flex-row bd-highlight">
            <h5 class="bd-highlight">{{ $comment->user->name }}</h5>
            <small>
                <h6 class="text-secondary ps-2 pt-1 bd-highlight">{{ date('d M y', $comment->created_at->timestamp) }}
                </h6>
            </small>
        </div>

        {{-- <div class="d-flex justify-content-start">
            <h5>{{ $comment->user->name }}</h5>
            <h6 class="text-secondary">{{ $comment->created_at }}</h6>
        </div> --}}

        <small>
            <p class="mb-1">{{ $comment->body }}</p>
        </small>

        @livewire('article.comment-replies', ['comment' => $comment], key(time() . $comment->id))

    </div>

    @include('livewire.article.commentDisplay', ['comments' => $comment->replies])

    @if (!$comment->parent_id)
    <hr>
    @endif
</div>
@endforeach