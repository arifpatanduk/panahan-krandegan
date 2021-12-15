@extends('layouts.backend')
@section('title', 'Verifikasi Email')

@section('content')
<div class="container">
    <div class="my-3 justify-content-center">
        <div class="stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4>Verifikasi Email Anda</h4>
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif
                    Sebelum melanjutkan, harap verifikasi email melalui link pada email Anda.
                    Jika Anda tidak menerima email,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                            klik disini
                        </button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection