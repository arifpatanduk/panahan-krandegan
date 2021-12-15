@extends('layouts.backend')
@section('title', 'Manajemen Wahana')
@section('wahana-active', 'active')
@section('content')
@livewire('admin.wahana.wahana', ['user' => $user], key(time() . $user->id))
@endsection