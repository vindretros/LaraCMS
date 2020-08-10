<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    <title>{{ config('hotel.hotel_name') }} - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    @include('partials.housekeeping._stylesheets')

    @yield('stylesheets')

</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    @include('partials.housekeeping._navibar')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif
        @yield('content')
    </div>
</div>
@include('partials.housekeeping._footer')
<script>
    var BASE_URL = '{{ url('/') }}';
</script>
@include('partials.housekeeping._scripts')


@yield('scripts')
</div>
<!-- End of Page Wrapper -->
</body>
</html>
