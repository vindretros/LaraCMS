<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('hotel.hotel_name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if (!\Request::is('housekeeping/user/pin*'))
        <li class="nav-item {{ (request()->is('housekeeping/index')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('housekeeping.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item {{ (request()->is('housekeeping/player*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('housekeeping.player.index') }}">
                <i class="fas fa-fw fa-user-friends"></i>
                <span>{{ __('Players') }}</span></a>
        </li>
        <li class="nav-item {{ (request()->is('housekeeping/news*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('housekeeping.news.index') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>{{ __('News') }}</span></a>
        </li>
        <li class="nav-item {{ (request()->is('housekeeping/cms_settings*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('housekeeping.cms_settings.index') }}">
                <i class="fas fa-fw fa-cogs"></i>
                <span>{{ __('Cms settings') }}</span></a>
        </li>
        <li class="nav-item {{ (request()->is('housekeeping/wordfilter*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('housekeeping.wordfilter.index') }}">
                <i class="fas fa-filter"></i>
                <span>{{ __('Wordfilter') }}</span></a>
        </li>
@endif

<!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item no-arrow">
                    <a class="nav-link" href="{{ route('me') }}" id="userDropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->username }}</span>
                        <img class="img-profile rounded-circle"
                             src="https://www.habbo.nl/habbo-imaging/avatarimage?figure={{ Auth::user()->look }}&head_direction=3&gesture=sml&size=l&headonly=1">
                    </a>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->
