@extends('layouts.frontend')
@section('beranda-active', 'current')
@section('title', 'Gandewalana')
@section('content')
<!--Main Slider Start-->
<section class="main-slider">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
            "effect": "fade",
            "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
            },
            "navigation": {
                "nextEl": ".main-slider-button-next",
                "prevEl": ".main-slider-button-prev",
                "clickable": true
            },
            "autoplay": {
                "delay": 5000
            }}'>

        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="image-layer"
                    style="background-image: url({{asset('frontend/assets/images/backgrounds/hero1.jpeg')}});">
                </div>
                <div class="image-layer-overlay"></div>
                <div class="container">
                    <div class="swiper-slide-inner">
                        <div class="row">
                            <div class="col-xl-12">
                                <h2> Gandewalana</h2>
                                <p>Krandegan Desa Wahana Dolanan Panah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="image-layer"
                    style="background-image: url({{asset('frontend/assets/images/backgrounds/hero3.jpeg')}});">
                </div>
                <div class="image-layer-overlay"></div>
                <div class="container">
                    <div class="swiper-slide-inner">
                        <div class="row">
                            <div class="col-xl-12">
                                <h2> Gandewalana</h2>
                                <p>Krandegan Desa Wahana Dolanan Panah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="image-layer"
                    style="background-image: url({{asset('frontend/assets/images/backgrounds/main-slider-3-ar.jpg')}});">
                </div>
                <div class="image-layer-overlay"></div>
                <div class="container">
                    <div class="swiper-slide-inner">
                        <div class="row">
                            <div class="col-xl-12">
                                <h2> Gandewalana</h2>
                                <p>Krandegan Desa Wahana Dolanan Panah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-slider-nav">
            <div class="main-slider-button-prev"><span class="icon-right-arrow"></span></div>
            <div class="main-slider-button-next"><span class="icon-right-arrow"></span> </div>
        </div>
    </div>
</section>

<!--Tour Search Start-->
<section class="tour-search">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="tour-search-box">
                    <div class="tour-search-one">
                        <div class="row p-3">
                            <div class="col-md-6 text-center">
                                <p class="mb-1">Instagram</p>
                                <h5>
                                    <a href="#">
                                        Gandewalana
                                    </a>
                                </h5>
                            </div>
                            <div class="col-md-6 text-center">
                                <p class="mb-1">Facebook</p>
                                <h5><a href="#">Gandewalana</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Tour Search End-->

<!--Destinations One Start-->
<section class="destinations-one">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Destination lists</span>
            <h2 class="section-title__title">Wahana Gandewalana</h2>
        </div>
        <div class="row masonary-layout">
            <div class="col-xl-3 col-lg-3">
                <div class="destinations-one__single">
                    <div class="destinations-one__img">
                        <img src="{{asset('frontend/assets/images/destination/destination-1-1.png')}}" alt="">
                        <div class="destinations-one__content">
                            <h2 class="destinations-one__title"><a href="destinations-details.html">Spain</a>
                            </h2>
                        </div>
                        <div class="destinations-one__button">
                            <a href="#">6 tours</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="destinations-one__single">
                    <div class="destinations-one__img">
                        <img src="{{asset('frontend/assets/images/destination/destination-1-2.png')}}" alt="">
                        <div class="destinations-one__content">
                            <p class="destinations-one__sub-title">Wildlife</p>
                            <h2 class="destinations-one__title"><a href="destinations-details.html">Thailand</a>
                            </h2>
                        </div>
                        <div class="destinations-one__button">
                            <a href="#">6 tours</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="destinations-one__single">
                    <div class="destinations-one__img">
                        <img src="{{asset('frontend/assets/images/destination/destination-1-3.png')}}" alt="">
                        <div class="destinations-one__content">
                            <h2 class="destinations-one__title"><a href="destinations-details.html">Africa</a>
                            </h2>
                        </div>
                        <div class="destinations-one__button">
                            <a href="#">6 tours</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="destinations-one__single">
                    <div class="destinations-one__img">
                        <img src="{{asset('frontend/assets/images/destination/destination-1-4.png')}}" alt="">
                        <div class="destinations-one__content">
                            <h2 class="destinations-one__title"><a href="destinations-details.html">Australia</a></h2>
                        </div>
                        <div class="destinations-one__button">
                            <a href="#">6 tours</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="destinations-one__single">
                    <div class="destinations-one__img">
                        <img src="{{asset('frontend/assets/images/destination/destination-1-5.png')}}" alt="">
                        <div class="destinations-one__content">
                            <p class="destinations-one__sub-title">Adventure</p>
                            <h2 class="destinations-one__title"><a href="destinations-details.html">Switzerland</a></h2>
                        </div>
                        <div class="destinations-one__button">
                            <a href="#">6 tours</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--Destinations One End-->

{{-- iklan --}}

<!--Informasi Start-->
<section class="popular-tours" style="margin-top: 100px">
    <div class="popular-tours__container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Informasi</span>
            <h2 class="section-title__title">Fasilitas dan Merchandise</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="popular-tours__carousel owl-theme owl-carousel">
                    <div class="popular-tours__single">
                        <div class="popular-tours__img">
                            <img src="{{asset('frontend/assets/images/resources/popular-tours__img-1.jpg')}}" alt="">
                            <div class="popular-tours__icon">
                                <a href="tour-details.html">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="popular-tours__content">
                            <div class="popular-tours__stars">
                                <i class="fa fa-star"></i> 8.5
                            </div>
                            <h3 class="popular-tours__title"><a href="tour-details.html">Panahan Utama</a></h3>
                            <p class="popular-tours__rate"><span>Rp. 10.000</span> / Per Gundul</p>
                            <ul class="popular-tours__meta list-unstyled">
                                <li><a href="">Lihat Selengkapnya</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="popular-tours__single">
                        <div class="popular-tours__img">
                            <img src="{{asset('frontend/assets/images/resources/popular-tours__img-2.jpg')}}" alt="">
                            <div class="popular-tours__icon">
                                <a href="tour-details.html">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="popular-tours__content">
                            <div class="popular-tours__stars">
                                <i class="fa fa-star"></i> 10.0 Superb
                            </div>
                            <h3 class="popular-tours__title"><a href="tour-details.html">Kolam renang anak</a></h3>
                            <p class="popular-tours__rate"><span>$1870</span> / Per Gundul</p>
                            <ul class="popular-tours__meta list-unstyled">
                                <li><a href="">Lihat Selengkapnya</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="popular-tours__single">
                        <div class="popular-tours__img">
                            {{-- <img src="{{asset('frontend/assets/images/resources/popular-tours__img-3.jpg')}}"
                                alt=""> --}}
                            <img src="{{asset('frontend/assets/images/resources/popular-tours__img-3.jpg')}}" alt="">
                            <div class="popular-tours__icon">
                                <a href="tour-details.html">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="popular-tours__content">
                            <div class="popular-tours__stars">
                                <i class="fa fa-star"></i> 9.1
                            </div>
                            <h3 class="popular-tours__title"><a href="tour-details.html">Taman bermain</a></h3>
                            <p class="popular-tours__rate"><span>Rp. 1000</span> / Per Gundul</p>
                            <ul class="popular-tours__meta list-unstyled">
                                <li><a href="">Lihat Selengkapnya</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Wahana End-->

<!--Why Choose Start-->
<section class="why-choose">
    <div class="why-choose__container">
        <div class="why-choose__left">
            <div class="why-choose__left-bg"
                style="background-image: url({{asset('frontend/assets/images/backgrounds/krandegan.jpg')}})">
            </div>
            {{-- <div class="why-choose__toggle">
                <p>Trips <br> & tours</p>
            </div> --}}
        </div>
        <div class="why-choose__right">
            <div class="why-choose__right-map"
                style="background-image: url({{asset('frontend/assets/images/shapes/why-choose-right-map.png')}})">
            </div>
            <div class="why-choose__right-content">
                <div class="section-title text-left">
                    <span class="section-title__tagline">Sekilas tentang</span>
                    <h2 class="section-title__title">Gandewalana</h2>
                </div>
                <p class="why-choose__right-text">There are many variations of passages of Lorem Ipsum is simply
                    free text available in the market for you, but the majority have suffered alteration in some
                    form.</p>
                <ul class="list-unstyled why-choose__list">
                    <li>
                        <div class="icon">
                            <span class="icon-travel-map"></span>
                        </div>
                        <div class="text">
                            <h4>Desa Krandegan</h4>
                            <p>Desa Krandegan yang terletak di Kec. Bayan Purworejo menjadi Desa Mandiri pada
                                awal 2021 berkat dukungan aplikasi Early Warning System Banjir di Sungai Jali</p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <span class="icon-hang-gliding"></span>
                        </div>
                        <div class="text">
                            <h4>Wisata Panahan</h4>
                            <p>Lorem ipsum is simply free text dolor sit but the majority have suffered amet,
                                consectetur notted.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--Why Choose End-->

<!--Gallery One Start-->
<section class="gallery-one" style="margin-top: -50px;padding-top:120px">
    <div class="gallery-one-bg"
        style="background-image: url({{asset('frontend/assets/images/shapes/gallery-map.png')}})"></div>
    <div class="gallery-one__container-box clearfix">
        <ul class="list-unstyled gallery-one__content clearfix">
            <li class="wow fadeInUp" data-wow-delay="100ms">
                <div class="gallery-one__img-box">
                    <img src="{{asset('frontend/assets/images/gallery/gallery-one-img-1.jpg')}}" alt="">
                    <div class="gallery-one__iocn">
                        <a class="img-popup" href="{{asset('frontend/assets/images/gallery/gallery-one-img-1.jpg')}}"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </li>
            <li class="wow fadeInUp" data-wow-delay="200ms">
                <div class="gallery-one__img-box">
                    <img src="{{asset('frontend/assets/images/gallery/gallery-one-img-2.jpg')}}" alt="">
                    <div class="gallery-one__iocn">
                        <a class="img-popup" href="{{asset('assets/images/gallery/gallery-one-img-2.jpg')}}"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </li>
            <li class="wow fadeInUp" data-wow-delay="300ms">
                <div class="gallery-one__img-box">
                    <img src="{{asset('frontend/assets/images/gallery/gallery-one-img-3.jpg')}}" alt="">
                    <div class="gallery-one__iocn">
                        <a class="img-popup" href="{{asset('frontend/assets/images/gallery/gallery-one-img-3.jpg')}}"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </li>
            <li class="wow fadeInUp" data-wow-delay="400ms">
                <div class="gallery-one__img-box">
                    <img src="{{asset('frontend/assets/images/gallery/gallery-one-img-4.jpg')}}" alt="">
                    <div class="gallery-one__iocn">
                        <a class="img-popup" href="{{asset('assets/images/gallery/gallery-one-img-4.jpg')}}"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </li>
            <li class="wow fadeInUp" data-wow-delay="500ms">
                <div class="gallery-one__img-box">
                    <img src="{{asset('frontend/assets/images/gallery/gallery-one-img-5.jpg')}}" alt="">
                    <div class="gallery-one__iocn">
                        <a class="img-popup" href="{{asset('assets/images/gallery/gallery-one-img-5.jpg')}}"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<!--Gallery Oned End-->

<!--Partner One Start-->
<section class="brand-one">
    <div class="brand-one-shape"
        style="background-image: url({{asset('frontend/assets/images/shapes/brand-one-shape.png')}})"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <div class="brand-one__title">
                    <h2>Kerjasama</h2>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="brand-one__main-content">
                    <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                    "0": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "375": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "575": {
                        "spaceBetween": 30,
                        "slidesPerView": 3
                    },
                    "767": {
                        "spaceBetween": 50,
                        "slidesPerView": 4
                    },
                    "991": {
                        "spaceBetween": 50,
                        "slidesPerView": 5
                    },
                    "1199": {
                        "spaceBetween": 50,
                        "slidesPerView": 5
                    }
                }}'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/brand/brand-one-1.png')}}" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/brand/brand-one-2.png')}}" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/brand/brand-one-3.png')}}" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/brand/brand-one-4.png')}}" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/brand/brand-one-5.png')}}" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/brand/brand-one-1.png')}}" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/brand/brand-one-2.png')}}" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/brand/brand-one-3.png')}}" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/brand/brand-one-4.png')}}" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="{{asset('frontend/assets/images/brand/brand-one-5.png')}}" alt="">
                            </div><!-- /.swiper-slide -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Brand One End-->

<!--Artikel One Start-->
<section class="news-one">
    <div class="container">
        <div class="news-one__top">
            <div class="row">
                <div class="col-xl-9 col-lg-9">
                    <div class="news-one__top-left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">dari postingan</span>
                            <h2 class="section-title__title">Berita & Artikel</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="news-one__top-right">
                        <a href="{{ route('articles.index') }}" class="news-one__btn thm-btn">Lihat Semua
                            Postingan</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="news-one__bottom">
            <div class="row">

                @foreach ($articles as $article)
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
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
    </div>
</section>
<!--Artikel One End-->
@endsection