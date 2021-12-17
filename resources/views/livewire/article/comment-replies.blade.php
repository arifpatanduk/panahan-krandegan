<div>
    @if (!$replyMode)
    <button wire:click.prevent="reply({{ $comment->id }})" class="btn btn-sm btn-outline-secondary rounded">
        <i class="fas fa-reply"></i> Balas
    </button>

    @elseif ($replyMode == $comment->id)
    <form wire:submit.prevent="storeReply({{ $comment->id }})">
        <div>
            <input wire:model="body" type="text" class="form-control @error('body') is-invalid @enderror "
                id="inputPassword2" placeholder="Tulis komentar">
            @error('body')
            <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
        </div>
        <div class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn btn-sm btn-outline-dark mx-1"
                wire:click.prevent="cancelReply({{ $comment->id }})">Batal</button>
            <button type="submit" class="btn btn-sm btn-dark mx-1">Kirim
                <div wire:target="storeReply({{ $comment->id }})" wire:loading>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                    </span>
                </div>
            </button>
        </div>
    </form>
    @endif

</div>