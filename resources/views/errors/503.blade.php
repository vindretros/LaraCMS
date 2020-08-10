@extends('layouts.app')

@section('title', '503')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-top text-center">{{ __('Maintenance') }}</div>
                    <div class="text-center">
                    <span>
                        {{ __('maintenance.text') }}
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-top text-center">{{ __('Admin login') }}</div>
                    <div class="text-center">
                    <span>
                        <form method="POST" action="{{ route('auth.admin.login') }}">
                        @csrf
                        @if(session('login'))
                            <div class="alert alert-danger" role="alert">{{ session('login') }}</div>
                        @endif
                        <div class="form-group">
                            <label>{{ __('Email/username') }}</label>
                            <input id="text" class="form-control{{ $errors->has('mail') ? ' is-invalid' : '' }}"
                                   name="mail" value="{{ old('mail') }}" required autofocus>
                            @if ($errors->has('mail'))
                                <span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('mail') }}</strong>
						</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ __('Password') }}</label>
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
                            @endif
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
