@extends('layouts.backend')
@section('title', 'Manajemen Galeri')
@section('gallery-active', 'active')
@section('content')

@livewire('admin.gallery.gallery', ['user' => $user], key(time() . $user->id))

@endsection