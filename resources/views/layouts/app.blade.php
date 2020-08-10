<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    <title>{{ config('hotel.hotel_name') }} - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @include('partials._stylesheets')

    @yield('stylesheets')

</head>
<body class="d-flex flex-column min-vh-100" data-theme="@if(Auth::check()){{ Auth::user()->theme }}@else light @endif">
@include('partials._navibar')
<div class="container mb-4">
    @yield('content')
</div>

<footer class="mt-auto">
    @include('partials._footer')
</footer>

<script>
    var BASE_URL = '{{ url('/') }}';
</script>
@include('partials._scripts')


@yield('scripts')

</body>
</html>
