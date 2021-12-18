<div>
    <div class="comment-one">
        <h3 class="comment-one__title">{{$totalReviews}} Ulasan</h3>
        {{-- review saya --}}
        @if ($isReviewed)
        <div class="comment-one__single">
            <div class="comment-one__image">
                <img src="{{url($userReviewed->userReview->avatar)}}" alt="">
            </div>
            <div class="comment-one__content">
                <h3>{{$userReviewed->userReview->name}}</h3>
                <div class="d-flex justify-content-between">
                    <p class="text-warning mb-2">
                        @for ($i = 0; $i < 5; $i++)
                            @if($userReviewed->rating > $i)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </p>
                </div>
                <p>{{$userReviewed->review}}</p>
                <p class="news-details__tags">
                    <button wire:click.prevent="editReview" class="btn btn-sm thm-btn">Edit</button>
                    <button wire:click.prevent="deleteReview" class="btn btn-sm thm-btn">
                        <div wire:loading.remove wire:target="deleteReview">
                            Hapus
                        </div>
                        <div wire:target="deleteReview" wire:loading>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                            </span>
                            Menghapus...
                        </div>
                    </button>
                </p>
            </div>
        </div>
        @endif

        @if ($isReviewedAll)
            @foreach ($reviews as $review)
            <div class="comment-one__single">
                <div class="comment-one__image">
                    <img src="{{url($review->userReview->avatar)}}" alt="">
                </div>
                <div class="comment-one__content">
                    <h3>{{$review->userReview->name}}</h3>
                    <p class="text-warning mb-2">
                        @for ($i = 0; $i < 5; $i++)
                            @if($review->rating > $i)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </h4>
                    <p>{{$review->review}}</p>
                </div>
            </div>
            @endforeach
        @endif
    </div>
    @if (session()->has('reviewStored'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('reviewStored')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <br>
    @elseif(session()->has('reviewDeleted'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('reviewDeleted')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <br>
    @endif
    <div id="review" class="review"></div>
    @if ($editReview || $isReviewed==false)
        @livewire('user.information.add-review', key(time() . $user->id), ['information'=>$information, 'user'=>$user])
    @endif
</div>