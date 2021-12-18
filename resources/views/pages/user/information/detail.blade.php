@extends('layouts.frontend')
@section('informasi-active', 'current')
@section('title', 'Informasi')
@section('content')

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header__top">
       <div class="page-header-bg" style="background-image:{{count($information->informationImages) != 0 ? Storage::url($information->informationImages[0]->images) : ''}}"></div>
       <div class="page-header-bg-overly"></div>
        <div class="container">
            <div class="page-header__top-inner">
                <h2>{{$information->name}}</h2>
            </div>
        </div>
    </div>
    <div class="page-header__bottom">
        <div class="container">
            <div class="page-header__bottom-inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><span>.</span></li>
                    <li class="active">{{$information->name}}</li>
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
                            @if (count($information->informationImages) != 0)
                            <img src="{{Storage::url($information->informationImages[0]->images)}}" alt=""
                            class="xzoom"
                            id="xzoom-default"
                            xoriginal="{{Storage::url($information->informationImages[0]->images)}}"/>    
                            @else
                            <img src="{{asset('frontend/assets/images/blog/news-details-img-1.jpg')}}" alt="">
                            @endif
                            <div class="news-one__date">
                                <p>{{$information->created_at->format('d')}}<br> <span>{{$information->created_at->format('M')}}</span></p>
                            </div>
                        </div>
                        <div class="xzoom-thumbs">
                            @if(count($information->informationImages) != 0)
                            @foreach ($information->informationImages as $img)
                            <a href="{{Storage::url($img->images)}}">
                                <img src="{{Storage::url($img->images)}}" alt="" class="xzoom-gallery" width="128" height="128" xpreview="{{Storage::url($img->images)}}">
                            </a>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="news-details__content">
                        <ul class="list-unstyled news-one__meta">
                            <li><a href="#"><i class="far fa-user-circle"></i>Admin</a></li>
                            <li><a href="#"><i class="far fa-star"></i>{{$information->total_rating}}</a>
                            </li>
                        </ul>
                        <h3 class="news-details__title">{{$information->name}}</h3>
                        <div>{!!$information->desc!!}</div>
                    </div>
                    <div class="news-details__bottom">
                        <div class="news-details__tags news-details__social-list">
                            <span>Share:</span>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    @livewire('user.information.review', key(time() . $user->id), ['user' => $user, 'information'=>$information])
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">Informasi Terbaru</h3>
                        <ul class="sidebar__post-list list-unstyled">
                            @foreach ($recentInformations as $recentInformation)
                            <li>
                                <div class="sidebar__post-image">
                                    <img src="{{ count($recentInformation->informationImages) != 0 ? Storage::url($recentInformation->informationImages[0]->images) : asset('frontend/assets/images/blog/lp-1-1.jpg')}}" alt="">
                                </div>
                                <div class="sidebar__post-content">
                                    <h3>
                                        <a href="{{route('user.information.show', ['information_id'=>$recentInformation->id])}}" class="sidebar__post-content_meta"><i class="fas fa-star"></i>{{$recentInformation->total_rating}}</a>
                                        <a href="{{route('user.information.show', ['information_id'=>$recentInformation->id])}}">{!!substr($recentInformation->name, 0, 50)!!}</a>
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
        .star {
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
            }
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