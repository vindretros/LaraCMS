@extends('layouts.housekeeping')

@section('title', __('News create'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-0 font-weight-bold text-primary">{{ __('News create') }}</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{ Form::open(['route' => ['housekeeping.news.store', 'method' => 'post']]) }}

            <div class="form-group">
                {{ Form::label('title', __('Title')) }}
                {{ Form::text('title',null, ['class' => 'form-control']) }}
                {!! $errors->first('title', '<p class="help-block text-danger">:message</p>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('image',__('Image')) }}
                {{ Form::select('image', $images,null, ['class' => 'form-control', 'id' => 'image']) }}
                {!! $errors->first('image', '<p class="help-block text-danger">:message</p>') !!}
                <a href="#" id="preview" target="_blank">{{ __('Preview') }}</a>
            </div>
            <div class="form-group">
                {{ Form::label('description', __('Description')) }}
                {{ Form::text('description',null, ['class' => 'form-control']) }}
                {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('content', __('Content')) }}
                {{ Form::textArea('content',null, ['class' => 'ckeditor']) }}
                {!! $errors->first('content', '<p class="help-block text-danger">:message</p>') !!}
            </div>


            {{Form::submit(__('Create'), ['class' => 'btn btn-success float-right'])}}

            {{ Form::close() }}
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $("#image").change(function () {
            $("#preview").attr("href", BASE_URL + '/images/news/' + $("#image").val());
        });
    </script>
@endsection
