@extends('layouts.app')

@section('title', __('Community'))

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-header text-white"
                     style="background-color: #2770e6">
                    {{ __('Credits') }}
                </div>
                <div class="card-body">
                    @foreach($credits as $user)
                        <div class="row">
                            <div class="col-md-4">
                                <img src="https://www.habbo.nl/habbo-imaging/avatarimage?figure={{$user->look}}"
                                     class="img-fluid" alt=" {{ $user->username }}">
                            </div>
                            <div class="col-md-8 text-center align-self-center">
                                <span style="color: #00ab54">{{ $user->username }}</span><br>
                                {{ __('Credits') }}: {{ $user->credits }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-header text-white"
                     style="background-color: #2770e6">
                    {{ __('Duckets') }}
                </div>
                <div class="card-body">
                    @foreach($duckets as $ducket)
                        <div class="row">
                            <div class="col-md-4">
                                <img src="https://www.habbo.nl/habbo-imaging/avatarimage?figure={{$ducket->user->look}}"
                                     class="img-fluid" alt=" {{ $ducket->user->username }}">
                            </div>
                            <div class="col-md-8 text-center align-self-center">
                                <span style="color: #00ab54">{{ $ducket->user->username }}</span><br>
                                {{ __('Duckets') }}: {{ $ducket->amount }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-header text-white"
                     style="background-color: #2770e6">
                    {{ __('Diamonds') }}
                </div>
                <div class="card-body">
                    @foreach($diamonds as $diamond)
                        <div class="row">
                            <div class="col-md-4">
                                <img
                                    src="https://www.habbo.nl/habbo-imaging/avatarimage?figure={{$diamond->user->look}}"
                                    class="img-fluid" alt=" {{ $diamond->user->username }}">
                            </div>
                            <div class="col-md-8 text-center align-self-center">
                                <span style="color: #00ab54">{{ $diamond->user->username }}</span><br>
                                {{ __('Diamonds') }}: {{ $diamond->amount }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-header text-white"
                     style="background-color: #2770e6">
                    {{ __('Respect received') }}
                </div>
                <div class="card-body">
                    @foreach($respect_received as $respect)
                        <div class="row">
                            <div class="col-md-4">
                                <img
                                    src="https://www.habbo.nl/habbo-imaging/avatarimage?figure={{$respect->user->look}}"
                                    class="img-fluid" alt=" {{ $respect->user->username }}">
                            </div>
                            <div class="col-md-8 text-center align-self-center">
                                <span style="color: #00ab54">{{ $respect->user->username }}</span><br>
                                {{ __('Respect received') }}: {{ $respect->respect_received ?? 0 }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-header text-white"
                     style="background-color: #2770e6">
                    {{ __('Respect given') }}
                </div>
                <div class="card-body">
                    @foreach($respect_given as $respect)
                        <div class="row">
                            <div class="col-md-4">
                                <img src="https://www.habbo.nl/habbo-imaging/avatarimage?figure={{$respect->user->look}}"
                                     class="img-fluid" alt=" {{ $respect->user->username }}">
                            </div>
                            <div class="col-md-8 text-center align-self-center">
                                <span style="color: #00ab54">{{ $respect->user->username }}</span><br>
                                {{ __('Respect given') }}: {{ $respect->respect_given ?? 0 }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-header text-white"
                     style="background-color: #2770e6">
                    {{ __('Online time') }}
                </div>
                <div class="card-body">
                    @foreach($online_time as $time)
                        <div class="row">
                            <div class="col-md-4">
                                <img
                                    src="https://www.habbo.nl/habbo-imaging/avatarimage?figure={{$time->user->look}}"
                                    class="img-fluid" alt=" {{ $time->user->username }}">
                            </div>
                            <div class="col-md-8 text-center align-self-center">
                                <span style="color: #00ab54">{{ $time->user->username }}</span><br>
                                {{ __('Online time') }}: {{ SiteHelper::timeToHuman($time->online_time) }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
