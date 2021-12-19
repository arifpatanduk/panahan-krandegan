<div>
    <button class="mx-2 {{ $isLike ? 'active' : '' }}" wire:click.prevent="likeOrUnlike">
        <i class="fas fa-thumbs-up"></i>
    </button>
</div>