@extends('layouts.app')

@section('title', __('Me'))

@section('content')

    <div class="row">
        <div class="col-md-7">
            <div class="home-user">
                <div class="home-user-avatar">
                    <img class="home-user-avatar-image" src="https://www.habbo.nl/habbo-imaging/avatarimage?figure={{ Auth::user()->look }}&head_direction=3&gesture=sml&size=l&headonly=1">
                </div>
                <div class="row">
                    <div class="col-md-6 nopadding-left">
                        <div class="home-user-details">
                            <div class="home-user-details-username"> {{ $user->username }}</div>
                            <div class="home-user-details-motto rounded pl-1 shadow_background"><b>Motto:</b> {{ Auth::user()->motto }}</div>
                        </div>
                    </div>
                    <div class="col-md-6 nopadding-left">
                        <a href="{{ route('client') }}" class="home-user-hotelbutton hotel-button" id="ga-linkid-hotel" target="_blank"><span class="hotel-button__text">{{ __('Go to :Name', ['Name' => config('hotel.hotel_name')]) }}</span></a>
                    </div>
                </div>
                <div style="padding-top: 10px;" class="row">
                    <div class="col-md-3 nopadding-left">
                        <div class="home-user-details-credits shadow_background rounded">{{ $user->credits }}</div>
                    </div>
                    <div class="col-md-3 nopadding-left">
                        <div class="home-user-details-duckets shadow_background rounded">{{ $user->duckets->amount  ?? 0}}</div>
                    </div>
                    <div class="col-md-3 nopadding-left">
                        <div class="home-user-details-diamonds shadow_background rounded">{{ $user->diamonds->amount ?? 0 }}</div>
                    </div>
                    <div class="col-md-3 nopadding-left">
                        <div class="home-user-details-hc shadow_background rounded">
                            @if(isset($user->settings->club_expire_timestamp) && $user->settings->club_expire_timestamp !== 0)
                            {{ \Carbon\Carbon::parse($user->settings->club_expire_timestamp)->diffInDays() }}
                            @else
                                0
                            @endif
                                {{ __('Days') }}
                        </div>
                    </div>
                </div>
            </div>
            @include('components.last_created_users')
            <br>
            @include('components.rooms')
        </div>
        <div class="col-md-5">
            @include('components.news')
        </div>
    </div>

@endsection
