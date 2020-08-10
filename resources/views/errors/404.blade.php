@extends('layouts.app')

@section('title', '404')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-top text-center">{{ __('Nothing found! What did you do?') }}</div>
                    <div class="text-center">
                    <span>
                        {{ __('404.not.found.text') }}
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
