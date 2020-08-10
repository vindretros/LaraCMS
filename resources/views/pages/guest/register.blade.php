@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="header">{{ __('Login') }}</h5>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label>{{ __('Username') }}</label>


                            <input id="username" type="text"
                                   class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                   name="username" value="{{ old('username') }}" required>

                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="mail">{{ __('E-email Address') }}</label>
                            <input id="mail" type="email"
                                   class="form-control{{ $errors->has('mail') ? ' is-invalid' : '' }}" name="mail"
                                   value="{{ old('mail') }}" required>
                            @if ($errors->has('mail'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mail') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="motto">{{ __('Motto') }}</label>
                            <input id="motto" type="text"
                                   class="form-control{{ $errors->has('motto') ? ' is-invalid' : '' }}" name="motto"
                                   value="{{ old('motto') }}" required>
                            @if ($errors->has('motto'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('motto') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ __('Gender') }}</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}" type="radio" name="gender" id="gender1" value="M" required @if(old('gender') === 'M' || old('gender') === null) checked @endif>
                                <label class="form-check-label" for="gender1">Jongen</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}" type="radio" name="gender" id="gender2" value="F" required @if(old('gender') === 'F') checked @endif>
                                <label class="form-check-label" for="gender2">Meisje</label>
                            </div>
                            @if ($errors->has('gender'))
                                <br>
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="ref">{{ __('Referral') }}</label>
                            <input id="ref" type="text"
                                   class="form-control{{ $errors->has('ref') ? ' is-invalid' : '' }}" name="ref"
                                   value="{{ old('ref') }}">
                            @if ($errors->has('ref'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ref') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


