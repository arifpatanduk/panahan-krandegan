<header class="main-header clearfix">
    <div class="main-header__top">
        <div class="container">
            <div class="main-header__top-inner clearfix">
                <div class="main-header__top-left">
                    <ul class="list-unstyled main-header__top-address">
                        <li>
                            <div class="icon">
                                <span class="icon-phone-call"></span>
                            </div>
                            <div class="text">
                                <a href="tel:+92-666-999-0000">+ 92 666 999 0000</a>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="icon-at"></span>
                            </div>
                            <div class="text">
                                <a href="mailto:needhelp@company.com">official@gandewalana.com</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="main-header__top-right">
                    <div class="main-header__top-right-inner">
                        <div class="main-header__top-right-social">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-dribbble"></i></a>
                        </div>
                        <div class="main-header__top-right-btn-box">
                            <a href="#" class="thm-btn main-header__top-right-btn">Become a local guide</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu clearfix">
        <div class="main-menu-wrapper clearfix">
            <div class="container clearfix">
                <div class="main-menu-wrapper-inner clearfix">
                    <div class="main-menu-wrapper__left clearfix">
                        <div class="main-menu-wrapper__logo">
                            <a href="index.html"><img src="{{asset('frontend/assets/images/resources/logo.png')}}"
                                    alt="" style="max-height: 36px"></a>
                        </div>
                        <div class="main-menu-wrapper__main-menu">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li class="@yield('beranda-active')"><a href="">Beranda</a></li>
                                <li class="dropdown @yield('destination-active')">
                                    <a href="">Destinations</a>
                                    <ul>
                                        <li><a href="/about">Desa Krandegan</a></li>
                                        <li><a href="">Kawasan Wisata Gandewalana</a></li>
                                    </ul>
                                </li>
                                <li class="@yield('roadmap-active')"><a href="">Roadmap</a></li>
                                <li class="dropdown @yield('informasi-active')">
                                    <a href="">Informasi</a>
                                    <ul>
                                        <li><a href="">Fasilitas</a></li>
                                        <li><a href="">Transportasi</a></li>
                                        <li><a href="">Penginapan</a></li>
                                        <li><a href="">Merchandise</a></li>
                                        <li><a href="">Promo</a></li>
                                    </ul>
                                </li>
                                <li class="@yield('galeri-active')"><a href="">Galeri</a></li>
                                <li class="@yield('berita-active')"><a href="">Berita</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="main-menu-wrapper__right">
                        {{-- <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a> --}}
                        @if (Auth::user())
                            <a href="#" class="main-menu__user icon-avatar"></a>
                        @else
                            <a href="/login" class="news-one__btn thm-btn">Masuk</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->