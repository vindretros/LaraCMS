@extends('layouts.app')

@section('title', __('Staff'))

@section('content')

    <div class="row">
        <div class="col-md-9">
            @foreach($ranks as $rank)
                <div class="card mb-2">
                    <div class="card-header text-white"
                         style="background-color: {{ $rank->prefix_color ?: '#2770e6' }}">
                        {{ $rank->rank_name }}
                    </div>
                    <div class="card-body">
                        @foreach($rank->users as $user)
                            <div class="col-md-3 h-100">
                                <div class="float-left">
                                <img src="https://www.habbo.nl/habbo-imaging/avatarimage?figure={{$user->look}}"
                                     alt="{{$user->username}}">
                                </div>
                                <div class="float-right mt-3">
                                    Naam: {{ $user->username }}
                                    <br>
                                    Motto: {{ $user->motto }}
                                    <br>
                                    @if((int)$user->online === 1)
                                        <img src="{{asset('images/online.png')}}" alt="online" style="cursor: pointer" onclick="followUser({{$user->id}})">
                                    @else
                                        <img src="{{asset('images/offline.png')}}" alt="offline">
                                    @endif
                                </div>


                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-success text-white">{{ __('About staff') }}</div>
                <div class="card-body">
                    {{ __('about.staff') }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @parent
    <script>
        function followUser(user_id) {
            $.post('{{ route('rcon.follow.user') }}', {user_id:user_id}).done(function (data) {
               if(data !== 'OK') {
                   alert('{{ __('Couldnt follow this user, you need to be logged in') }}');
               } else {
                   alert('{{__('You have stalked this user')}}')
               }
            }).fail(function (data) {
                alert('{{ __('Couldnt follow this user, you need to be logged in') }}');
            });
        }
    </script>

    @endsection
