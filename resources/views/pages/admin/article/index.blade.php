@extends('layouts.backend')
@section('title', 'Manajemen Artikel')
@section('article-active', 'active')
@section('content')

@livewire('admin.article.article', ['user' => $user], key(time() . $user->id))

@endsection