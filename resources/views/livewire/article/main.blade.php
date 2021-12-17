<div>
    <div class="news-details__bottom">
        <div class="news-details__social-list">
            @auth
            @livewire('article.likes', ['article_id' => $article_id], key(time() . $article_id))
            @endauth

            @guest
            <a href="{{ route('login') }}" class="mx-2">
                <i class="fas fa-thumbs-up"></i>
            </a>
            @endguest

            <button class=""><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>

    @livewire('article.comments', ['article_id' => $article_id], key(time() . $article_id))

</div>