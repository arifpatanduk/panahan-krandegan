<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('frontend/assets/images/favicons/apple-touch-icon.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('frontend/assets/images/resources/logo.png')}}" />
    <link rel="manifest" href="{{asset('frontend/assets/images/favicons/site.webmanifest')}}" />
    <meta name="description" content="@yield('title')" />
    @include('includes.frontend.styles')
</head>