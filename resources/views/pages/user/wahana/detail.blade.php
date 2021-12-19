@extends('layouts.frontend')
@section('beranda-active', 'current')
@section('title', 'Wahana')
@section('content')

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header__top">
       <div class="page-header-bg" style="background-image:{{count($wahana->wahanaImages) != 0 ? Storage::disk('s3')->temporaryUrl($wahana->wahanaImages[0]->images, now()->addMinutes(100)) : ''}}"></div>
       <div class="page-header-bg-overly"></div>
        <div class="container">
            <div class="page-header__top-inner">
                <h2>{{$wahana->title}}</h2>
            </div>
        </div>
    </div>
    <div class="page-header__bottom">
        <div class="container">
            <div class="page-header__bottom-inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><span>.</span></li>
                    <li class="active">{{$wahana->title}}</li>
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
                    <div class="gallery">
                        <div class="news-details__img xzoom-container">
                            @if (count($wahana->wahanaImages) != 0)
                            <img src="{{Storage::disk('s3')->temporaryUrl($wahana->wahanaImages[0]->images, now()->addMinutes(100))}}" alt=""
                            class="xzoom"
                            id="xzoom-default"
                            xoriginal="{{Storage::disk('s3')->temporaryUrl($wahana->wahanaImages[0]->images, now()->addMinutes(100))}}"/>    
                            @else
                            <img src="{{asset('frontend/assets/images/blog/news-details-img-1.jpg')}}" alt="">
                            @endif
                            <div class="news-one__date">
                                <p>{{$wahana->created_at->format('d')}}<br> <span>{{$wahana->created_at->format('M')}}</span></p>
                            </div>
                        </div>
                        <div class="xzoom-thumbs">
                            @if(count($wahana->wahanaImages) != 0)
                            @foreach ($wahana->wahanaImages as $img)
                            <a href="{{Storage::disk('s3')->temporaryUrl($img->images, now()->addMinutes(100))}}">
                                <img src="{{Storage::disk('s3')->temporaryUrl($img->images, now()->addMinutes(100))}}" alt="" class="xzoom-gallery" width="128" height="128" xpreview="{{Storage::disk('s3')->temporaryUrl($img->images, now()->addMinutes(100))}}">
                            </a>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="news-details__content">
                        <ul class="list-unstyled news-one__meta">
                            <li><a href="#"><i class="far fa-user-circle"></i>Admin</a></li>
                            <li><a href="#"><i class="far fa-star"></i>{{$wahana->total_rating}}</a>
                            </li>
                        </ul>
                        <h3 class="news-details__title">{{$wahana->title}}</h3>
                        <div>{!!$wahana->desc!!}</div>
                    </div>
                    <div class="news-details__bottom">
                        <div class="news-details__tags news-details__social-list">
                            <span>Share:</span>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    @livewire('user.wahana.review', key(time() . $user->id), ['user' => $user, 'wahana'=>$wahana])
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">Informasi Terbaru</h3>
                        <ul class="sidebar__post-list list-unstyled">
                            @foreach ($recentWahanas as $recentWahana)
                            <li>
                                <div class="sidebar__post-image">
                                    <img src="{{ count($recentWahana->wahanaImages) != 0 ? Storage::disk('s3')->temporaryUrl($recentWahana->wahanaImages[0]->images, now()->addMinutes(100)) : asset('frontend/assets/images/blog/lp-1-1.jpg')}}" alt="">
                                </div>
                                <div class="sidebar__post-content">
                                    <h3>
                                        <a href="{{route('wahana.show', ['wahana_id'=>$recentWahana->id])}}" class="sidebar__post-content_meta"><i class="fas fa-star"></i>{{$recentWahana->total_rating}}</a>
                                        <a href="{{route('wahana.show', ['wahana_id'=>$recentWahana->id])}}">{!!substr($recentWahana->title, 0, 50)!!}</a>
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
                    </div>
                    <div class="sidebar__single sidebar__tags">
                        <h3 class="sidebar__title">Tags</h3>
                        <div class="sidebar__tags-list">
                            <a href="#">Traveling</a>
                            <a href="#">Adventure</a>
                            <a href="#">Beach</a>
                            <a href="#">Parks</a>
                            <a href="#">Museum</a>
                            <a href="#">Tourisms</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!--News One End-->

@endsection

@push('addon-styles')
    @livewireStyles()
    <link rel="stylesheet" href="{{asset('frontend/assets/vendors/xzoom/xzoom.css')}}">
    <style>
        /* .star {
            visibility:hidden;
            font-size:30px;
            cursor:pointer;
            }
        .star:before {
            content: "\2606";
            position: absolute;
            visibility:visible;
            }
        .star:checked:before {
            content: "\2605";
            position: absolute;
            } */
    </style>
@endpush

@push('addon-scripts')
    @livewireScripts
    <script src="{{asset('frontend/assets/vendors/xzoom/xzoom.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#ffff',
                xoffset: 15,
            });
        });
    </script>
@endpush