@extends('layouts.app')

@section('title', __('Password change'))

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-header text-white"
                     style="background-color: #2770e6">
                    {{ __('Password change') }}
                </div>
                <div class="card-body">
                    {{ Form::open(['route' => ['settings.password.store', 'method' => 'post']]) }}

                    <div class="form-group">
                        {{ Form::label('old_password', __('Current password')) }}
                        {{ Form::password('old_password', ['class' => 'form-control', 'required']) }}
                        {!! $errors->first('old_password', '<p class="help-block text-danger">:message</p>') !!}
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', __('New password')) }}
                        {{ Form::password('password', ['class' => 'form-control','required']) }}
                        {!! $errors->first('password', '<p class="help-block text-danger">:message</p>') !!}
                    </div>

                    <div class="form-group">
                        {{ Form::label('password_confirmation', __('New password again')) }}
                        {{ Form::password('password_confirmation', ['class' => 'form-control','required']) }}
                        {!! $errors->first('password_confirmation', '<p class="help-block text-danger">:message</p>') !!}
                    </div>

                    {{Form::submit(__('Update'), ['class' => 'btn btn-success float-right'])}}

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection
