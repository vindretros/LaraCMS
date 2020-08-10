@extends('layouts.housekeeping')

@section('title', __('PIN update'))

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('PIN update') }}</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-0 font-weight-bold text-primary">{{ __('Fill your pincode') }}</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{Form::open(['route' => ['housekeeping.user.pin.create', 'method' => 'post']])}}
            {{Form::label('pin','Pin')}}
            {{Form::password('pin',['class' => 'form-control'])}}
            {!! $errors->first('pin', '<p class="help-block text-danger">:message</p>') !!}
            {{Form::label('re_pin',__('Pin again'))}}
            {{Form::password('re_pin',['class' => 'form-control'])}}
            {!! $errors->first('re_pin', '<p class="help-block text-danger">:message</p>') !!}
            <br>
            <button type="submit" class="btn btn-success float-right">{{ __('send') }}</button>
            </form>
        </div>
    </div>

@endsection
