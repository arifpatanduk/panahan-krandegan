<div>
    @auth
    <div class="comment-form mb-5">
        <h3 class="comment-form__title">{{ $total_comments }} Komentar</h3>
        <form wire:submit.prevent="storeComment" class="comment-one__form">
            <div class="row">
                <div class="col-xl-12">
                    <div class="comment-form__input-box">
                        <textarea wire:model="comment_body" class="mb-0" name="message"
                            placeholder="Tulis komentar Anda"></textarea>

                        @error('comment_body')
                        <span class="text-danger error"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <button type="submit" class="thm-btn comment-form__btn">
                        Submit komentar
                        <div wire:target="storeComment" wire:loading>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                            </span>
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
    @endauth

    @include('livewire.article.commentDisplay', ['comments' => $article->comments, 'article_id' => $article->id])
</div>