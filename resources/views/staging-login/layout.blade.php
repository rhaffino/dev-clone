<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    {{-- @include('v2.layout.component.meta') --}}
    @section('styles')
        {{-- @include('v2.layout3.component.style') --}}
    @show
    @stack('head')
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://accounts.google.com/gsi/client" async></script>
    {{-- <link rel="stylesheet" href="{{ mix('/assets/styles/staging-login.css') }}">
    <link rel="stylesheet" href="{{ mix('/assets/styles/main.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/css/staging-login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet"
        type="text/css">
</head>

<body class="@yield('body_class', 'cmlabs project-tracker')">
    @stack('start_body')
    @yield('content')

    @section('footer')
        <!-- Footer here -->
        {{-- @include('v2.free-consultation.campaign-modal') --}}
        {{-- @include('v2.layout3.component.footer-top') --}}
        {{-- @include('v2.layout3.component.footer-bottom') --}}
    @show
    {{-- @include('v2.layout.component.toast') --}}
    @stack('end_body')
    @section('scripts')
        {{-- @include('v2.layout3.component.script') --}}
    @show
    @stack('scripts')
</body>

</html>
