@extends('layouts.backend')
@section('title', 'Manajemen Iklan')
@section('ads-active', 'active')
@section('content')

@livewire('admin.ads.ads', ['user' => $user], key(time() . $user->id))

@endsection