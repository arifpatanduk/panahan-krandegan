@extends('layouts.backend-auth')
@section('title', 'Login')
@section('content')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo text-center">
                            <img src="{{ asset('frontend/assets/images/resources/logo.png') }}" alt="logo">
                        </div>
                        <h4>Hello! Selamat Datang di Gandewalana</h4>
                        <h6 class="font-weight-light">Login untuk melanjutkan.</h6>
                        <form class="pt-3" method="POST" action="{{ route('login') }}">

                            @csrf

                            <div class="form-group">
                                <input id="email" type="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email"
                                    autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    name="password" id="password" placeholder="Password"
                                    autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-secondary btn-lg font-weight-medium">
                                    Login
                                </button>

                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="auth-link text-black">
                                    Lupa password?
                                </a>
                                @endif
                            </div>
                            <div class="mb-2">
                                <a href="{{ route('login.provider', 'google') }}"
                                    class="btn btn-block btn-google auth-form-btn">
                                    <i class="typcn typcn-social-google-plus-circular mr-2"></i>Login dengan Google
                                </a>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Belum punya akun? <a href="{{ route('register') }}" class="text-primary">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@endsection