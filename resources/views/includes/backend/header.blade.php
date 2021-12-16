<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('backend/assets/vendors/typicons.font/font/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/css/vertical-layout-light/style.css')}}">
  <link rel="shortcut icon" href="{{asset('frontend/assets/images/resources/logo.png')}}" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.css"
    integrity="sha512-+VDbDxc9zesADd49pfvz7CgsOl2xREI/7gnzcdyA9XjuTxLXrdpuz21VVIqc5HPfZji2CypSbxx1lgD7BgBK5g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  @livewireStyles
  @stack('addon-styles')
  <x-head.tinymce-config />
</head>