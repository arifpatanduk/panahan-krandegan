@extends('layouts.backend-auth')
@section('title', 'Register')
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
                        <h6 class="font-weight-light">Lengkapi form dibawah untuk membuat akun.</h6>
                        <form class="pt-3" method="POST" action="{{ route('register') }}">

                            @csrf

                            <div class="form-group">
                                <input id="name" type="name"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    placeholder="Nama Lengkap" name="name" value="{{ old('name') }}" autocomplete="name"
                                    autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="email" type="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    name="password" id="password" placeholder="Password" autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" name="password_confirmation"
                                    id="password_confirm" placeholder="Confirm Password" autocomplete="new-password">
                            </div>

                            <div class="mt-3">
                                <button type="submit"
                                    class="mb-2 btn btn-block btn-secondary btn-lg font-weight-medium">
                                    Register
                                </button>

                            </div>
                            <div class="mb-2">
                                <a href="{{ route('login.provider', 'google') }}"
                                    class="btn btn-block btn-google auth-form-btn">
                                    <i class="typcn typcn-social-google-plus-circular mr-2"></i>Register dengan Google
                                </a>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Sudah punya akun? <a href="{{ route('login') }}" class="text-primary">Login</a>
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