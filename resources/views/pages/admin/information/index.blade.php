@extends('layouts.backend')
@section('title', 'Manajemen Informasi')
@section('information-active', 'active')
@section('content')
@livewire('admin.information.information', ['user' => $user], key(time() . $user->id))
@endsection