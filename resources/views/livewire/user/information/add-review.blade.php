<div>
    <div class="comment-form">
        <h3 class="comment-form__title">Beri Ulasan</h3>
        <form wire:submit.prevent="storeReview" class="comment-one__form">
            <div class="row">
                <div class="col-xl-12">
                    <div class="form-group my-3">
                        <label for="customRange2" class="form-label">Rating</label>
                        <input type="range" class="form-range" min="0" max="5" id="rate" wire:model="rate">
                    </div>
                    <div class="comment-form__input-box">
                        <textarea name="message" placeholder="Tulis ulasan" wire:model="review"></textarea>
                    </div>
                    <button type="submit" class="thm-btn comment-form__btn">
                        <div wire:loading.remove wire:target="storeReview">
                            Simpan
                        </div>
                        <div wire:target="storeReview" wire:loading>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                            </span>
                            Menyimpan...
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
