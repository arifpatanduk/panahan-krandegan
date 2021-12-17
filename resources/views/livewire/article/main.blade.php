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

            <button class=""><i class="fas fa-comment"></i></button>
            <button class=""><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>

    <div class="comment-form mb-5">
        <h3 class="comment-form__title">Leave a Comment</h3>
        <form action="inc/sendemail.php" class="comment-one__form">
            <div class="row">
                <div class="col-xl-12">
                    <div class="comment-form__input-box">
                        <textarea name="message" placeholder="Write Comment"></textarea>
                    </div>
                    <button class="thm-btn comment-form__btn">Submit Comment</button>
                </div>
            </div>
        </form>
    </div>

    <div class="comment-one">
        <h3 class="comment-one__title">2 Comments</h3>
        <div class="comment-one__single">
            <div class="comment-one__image">
                <img src="assets/images/blog/comment-1-1.png" alt="">
            </div>
            <div class="comment-one__content">
                <h3>Kevin Martin</h3>
                <p>It has survived not only five centuries, but also the leap into electronic
                    typesetting unchanged. It was popularised in the sheets containing lorem ipsum is
                    simply free text available in the martket to use now.</p>
                <a href="#" class="thm-btn comment-one__btn">Reply</a>
            </div>
        </div>
        <div class="comment-one__single mx-5">
            <div class="comment-one__image">
                <img src="assets/images/blog/comment-1-2.png" alt="">
            </div>
            <div class="comment-one__content">
                <h3>Sarah Albert</h3>
                <p>It has survived not only five centuries, but also the leap into electronic
                    typesetting unchanged. It was popularised in the sheets containing lorem ipsum is
                    simply free text available in the martket to use now.</p>
                <a href="#" class="thm-btn comment-one__btn">Reply</a>
            </div>
        </div>
    </div>
</div>