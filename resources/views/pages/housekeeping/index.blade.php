@extends('layouts.housekeeping')

@section('title', 'Homepage')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Current version') }}: {{ config('hotel.lara_cms_version')  }}
        , {{ __('Last version') }}: {{ $last_version }}</h1>
    @if(config('hotel.lara_cms_version') !== $last_version)
        <div class="alert alert-primary" role="alert">
            {{ __('There is an new version of LaraCMS: ') }} {{ $last_version }}
        </div>
    @endif
    <div class="col-md-12 row">
        <div class="col-md-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="m-0 font-weight-bold text-primary">{{ __('Last created users') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach($last_players as $player)
                        <div class="col-md-12 row">
                            <div class="float-left">
                                <img src="https://www.habbo.nl/habbo-imaging/avatarimage?figure={{$player->look}}"
                                     alt="{{$player->username}}">
                            </div>
                            <div class="float-right mt-3">
                                Naam: {{ $player->username }}
                                <br>
                                Motto: {{ $player->motto }}
                                <br>
                                @if((int)$player->online === 1)
                                    <img src="{{asset('images/online.png')}}" alt="online">
                                @else
                                    <img src="{{asset('images/offline.png')}}" alt="offline">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
