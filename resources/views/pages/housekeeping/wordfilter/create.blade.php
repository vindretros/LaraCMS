@extends('layouts.housekeeping')

@section('title', __('Wordfilter create'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-0 font-weight-bold text-primary">{{ __('Wordfilter create') }}</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{ Form::open(['route' => ['housekeeping.wordfilter.store'],'method' => 'post']) }}

            <div class="form-group">
                {{ Form::label('key', __('Key')) }}
                {{ Form::text('key',null, ['class' => 'form-control']) }}
                {!! $errors->first('key', '<p class="help-block text-danger">:message</p>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('replacement', __('Replacement')) }}
                {{ Form::text('replacement',null, ['class' => 'form-control']) }}
                {!! $errors->first('replacement', '<p class="help-block text-danger">:message</p>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('hide',__('Hide')) }}
                {{ Form::select('hide', [0 => __('No'), 1 => 'Yes'], null, ['class' => 'form-control']) }}
                {!! $errors->first('hide', '<p class="help-block text-danger">:message</p>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('report',__('Report')) }}
                {{ Form::select('report', [0 => __('No'), 1 => 'Yes'], null, ['class' => 'form-control']) }}
                {!! $errors->first('report', '<p class="help-block text-danger">:message</p>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('mute', __('Mute')) }}
                {{ Form::number('mute',null, ['class' => 'form-control']) }}
                {!! $errors->first('mute', '<p class="help-block text-danger">:message</p>') !!}
            </div>


            {{Form::submit(__('Save'), ['class' => 'btn btn-success float-right'])}}
            {{ Form::close() }}
        </div>
    </div>
@endsection
