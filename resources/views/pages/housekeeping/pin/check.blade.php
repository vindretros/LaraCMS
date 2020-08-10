@extends('layouts.housekeeping')

@section('title', __('PIN check'))

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('PIN check') }}</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-0 font-weight-bold text-primary">{{ __('Fill your pincode') }}</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{Form::open(['route' => ['housekeeping.user.pin.check', 'method' => 'post']])}}
            {{Form::password('pin',['class' => 'form-control'])}}
            <br>
            <button type="submit" class="btn btn-success float-right">{{ __('Send') }}</button>
            </form>
        </div>
    </div>

@endsection
