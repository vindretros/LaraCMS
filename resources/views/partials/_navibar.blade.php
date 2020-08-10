<header>
    <div class="container">
        <div class="logo">
            <div class="onlinecount">{{ $online_count }} {{ config('hotel.hotel_name') }}'s' online</div>
        </div>
        @if (Auth::check())
            <div class="user-menu__header">
                <a class="user-menu__toggle">
                    <div class="user-menu__name__wrapper">
                        <div class="user-menu__name">{{ Auth::user()->username }}</div>
                    </div>
                    <habbo-imager class="user-menu__avatar">
                        <img width="54" height="62" class="imager"
                             src="https://www.habbo.nl/habbo-imaging/avatarimage?figure={{ Auth::user()->look }}&headonly=1"
                             style="min-width: 54px;">
                    </habbo-imager>
                </a>
            </div>
        @endif
    </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light bg-dark navistyle">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('me') }}" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Me
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('me') }}">Me</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('settings.password.index') }}">{{ __('Change password') }}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('me') }}" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Community
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('top_players') }}">{{ __('Top players') }}</a>
                        </div>
                    </li>
                    <a class="nav-link" href="{{ route('Staff') }}">{{ __('Staff') }}</a>
                    <a class="nav-link" href="#" onclick="changeTheme()"><i class="fas fa-sun"></i></a>

                @else
                    <li class="nav-item iconheader headericonhome">
                        <a class="nav-link" href="{{ route('index') }}">{{ __('Login') }} <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item iconheader headericonusers">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }} <span class="sr-only">(current)</span></a>
                    </li>
                @endif
            </ul>
        </div>
        @if (Auth::check())
            @if (Auth::user()->rank > 3)
            <a class="nav-link" href="{{ route('housekeeping.index') }}">{{ __('Housekeeping') }}</a>
            @endif
            <ul class="navbar-nav">
                <a href="{{route('client')}}" class="hotel-button" id="ga-linkid-hotel" target="_blank"><span
                            class="hotel-button__text">{{ __('Go to :Name', ['Name' => config('hotel.hotel_name')]) }}</span></a>
            </ul>
        @endif
    </div>
</nav>
