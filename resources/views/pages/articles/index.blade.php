@extends('layouts.frontend')
@section('berita-active', 'current')
@section('title', 'Artikel & Berita')
@section('content')

<!--News One Start-->
<section class="news-one">
    <div class="container">
        <div class="row">


            @foreach ($articles as $article)
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                <!--News One Single-->
                <div class="news-one__single">
                    <div class="news-one__img">
                        <img src="{{ $article->image }}" alt="">
                        <a href="{{ route('articles.show', $article->slug) }}">
                            <span class="news-one__plus"></span>
                        </a>
                        <div class="news-one__date">
                            <p>
                                {{ date('d', $article->updated_at->timestamp) }}
                                <br>
                                <span>
                                    {{ date('M y', $article->updated_at->timestamp) }}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="news-one__content">
                        <ul class="list-unstyled news-one__meta">
                            <li>
                                <a href="{{ route('articles.show', $article->slug) }}">
                                    <i class="far fa-user-circle"></i>{{ $article->user->name }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('articles.show', $article->slug) }}">
                                    <i class="far fa-comments"></i>
                                    {{ count($article->allCommnets) }} Komentar
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('articles.show', $article->slug) }}">
                                    <i class="far fa-thumbs-up"></i>
                                    {{ count($article->allLikes) }} Suka
                                </a>
                            </li>
                        </ul>
                        <h3 class="news-one__title">
                            <a href="{{ route('articles.show', $article->slug) }}">
                                {{ \Illuminate\Support\Str::limit($article->title, 45, $end='...') }}
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--News One End-->

@endsection