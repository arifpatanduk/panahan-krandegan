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

            <button class="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-paper-plane"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bagikan ke Social Media</h5>
                            <button type="button" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-center">
                                <div class="news-details__social-list">
                                    @foreach ($shareComponent as $key => $value)
                                    <a href="{{ $value }}" target="_blank">
                                        <i class="fab fa-{{ $key }}"></i>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @livewire('article.comments', ['article_id' => $article_id], key(time() . $article_id))

</div>