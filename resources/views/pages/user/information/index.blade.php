@extends('layouts.frontend')
@section('informasi-active', 'current')
@section('title', 'Informasi')
@section('content')

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header__top">
       <div class="page-header-bg" style="background-image:"></div>
       <div class="page-header-bg-overly"></div>
        <div class="container">
            <div class="page-header__top-inner">
                <h2>Informasi Terbaru</h2>
            </div>
        </div>
    </div>
    <div class="page-header__bottom">
        <div class="container">
            <div class="page-header__bottom-inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><span>.</span></li>
                    <li class="active">Informasi Terbaru</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Informasi Start-->
<section class="popular-tours" style="margin-top: 100px">
    <div class="popular-tours__container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Informasi</span>
            <h2 class="section-title__title">Fasilitas dan Merchandise</h2>
        </div>
        
            @php
                $numOfCols = 4;
                $rowCount = 0;
                $bootstrapColWidth = 12 / $numOfCols;
            @endphp 
                @foreach ($informations as $information)
                @if ($rowCount % $numOfCols == 0)
                    <div class="row">
                @endif
                    @php
                        $rowCount++;
                    @endphp
                    <div class="col-md-{{$bootstrapColWidth}} my-3">
                        <div class="popular-tours__single">
                            <div class="popular-tours__img">
                                <img src="{{ count($information->informationImages) != 0 ? Storage::url($information->informationImages[0]->images) : asset('frontend/assets/images/resources/popular-tours__img-1.jpg')}}" alt="">
                            </div>
                            <div class="popular-tours__content">
                                <div class="popular-tours__stars">
                                    <i class="fa fa-star"></i> 8.5
                                </div>
                                <h3 class="popular-tours__title"><a href="tour-details.html">{{$information->name}}</a></h3>
                                <p>{!!strlen($information->desc) > 50  ? substr($information->desc, 0, 50)." ... " : $information->desc!!}</p>
                                <ul class="popular-tours__meta list-unstyled">
                                    <li><a href="{{route('user.information.show', ['information_id'=>$information->id])}}">Lihat Selengkapnya</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @if ($rowCount % $numOfCols == 0)
                </div>
                @endif
                @endforeach
    </div>
</section>
<!--Information End-->

@endsection

@push('addon-styles')
    @livewireStyles()
@endpush

@push('addon-scripts')
    @livewireScripts
@endpush