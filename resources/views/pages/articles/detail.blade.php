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

                    @livewire('article.main', ['article_id' => $article->id], key(time() . $article->id))

                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
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