@extends('layouts.housekeeping')

@section('title', __('Cms setting edit'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-0 font-weight-bold text-primary">{{ __('Cms setting edit') }}</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{ Form::model($cms_setting,['route' => ['housekeeping.cms_settings.update',$cms_setting->key],'method' => 'put']) }}

            <div class="form-group">
                {{ Form::label('value', __('Value')) }}
                {{ Form::text('value',null, ['class' => 'form-control']) }}
                {!! $errors->first('value', '<p class="help-block text-danger">:message</p>') !!}
            </div>

            {{Form::submit(__('Update'), ['class' => 'btn btn-success float-right'])}}

            {{ Form::close() }}
        </div>
    </div>
@endsection
