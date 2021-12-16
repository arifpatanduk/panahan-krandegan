@extends('layouts.frontend')
@section('berita-active', 'current')
@section('title', 'Artikel & Berita')
@section('content')

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header__bottom">
        <div class="container">
            <div class="page-header__bottom-inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li><span>.</span></li>
                    <li class="active">Detail Artikel</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--News One Start-->
<section class="news-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="news-details__left">
                    <div class="news-details__img">
                        <img src="{{ $article->image }}" alt="">
                    </div>
                    <div class="news-details__content">
                        <ul class="list-unstyled news-one__meta">
                            <li><a href="#"><i class="far fa-user-circle"></i>{{ $article->user->name
                                    }}</a></li>
                            <li><a href="#"><i class="far fa-calendar-alt"></i>{{ date('d M Y',
                                    $article->updated_at->timestamp) }}</a>
                            </li>
                        </ul>
                        <h3 class="news-details__title">{{ $article->title }}</h3>
                        <p class="news-details__text-1" style="white-space:pre-wrap; word-wrap:break-word">{{
                            $article->content }}</p>
                    </div>
                    <div class="news-details__bottom">
                        <div class="news-details__social-list">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-dribbble"></i></a>
                        </div>
                    </div>
                    <div class="author-one">
                        <div class="author-one__image">
                            <img src="assets/images/blog/author-1-1.jpg" alt="">
                        </div>
                        <div class="author-one__content">
                            <h3>Christine Eve</h3>
                            <p>It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining unchanged. It was popularised in the sheets containing.</p>
                        </div>
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
                        <div class="comment-one__single">
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
                    <div class="comment-form">
                        <h3 class="comment-form__title">Leave a Comment</h3>
                        <form action="inc/sendemail.php" class="comment-one__form">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="text" placeholder="Your name" name="name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="email" placeholder="Email address" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="comment-form__input-box">
                                        <textarea name="message" placeholder="Write Comment"></textarea>
                                    </div>
                                    <button type="submit" class="thm-btn comment-form__btn">Submit Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    {{-- <div class="sidebar__single sidebar__search">
                        <h3 class="sidebar__title clr-white">Search</h3>
                        <form action="#" class="sidebar__search-form">
                            <input type="search" placeholder="Search">
                            <button type="submit"><i class="icon-magnifying-glass"></i></button>
                        </form>
                    </div> --}}
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">Artikel Terbaru</h3>
                        <ul class="sidebar__post-list list-unstyled">
                            @foreach ($news as $new)
                            <li>
                                <div class="sidebar__post-image">
                                    <img src="{{ $new->image }}" alt="">
                                </div>
                                <div class="sidebar__post-content">
                                    <h3>
                                        <a href="{{ route('articles.show', $new->slug) }}"
                                            class="sidebar__post-content_meta"><i class="far fa-calendar-alt"></i>{{
                                            date('d M Y',
                                            $new->updated_at->timestamp) }}</a>
                                        <a href="{{ route('articles.show', $new->slug) }}">
                                            {{ \Illuminate\Support\Str::limit($new->title, 30, $end='...') }}
                                        </a>
                                    </h3>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- <div class="sidebar__single sidebar__category">
                        <h3 class="sidebar__title">All Categories</h3>
                        <ul class="sidebar__category-list list-unstyled">
                            <li><a href="#">Trip & Tours</a></li>
                            <li><a href="#">Traveling</a></li>
                            <li><a href="#">Adventures</a></li>
                            <li><a href="#">National Parks</a></li>
                            <li><a href="#">Beaches and Sea</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!--News One End-->

@endsection