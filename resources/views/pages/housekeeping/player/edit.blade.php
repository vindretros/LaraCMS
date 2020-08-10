@extends('layouts.housekeeping')

@section('title', __('Player edit'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-0 font-weight-bold text-primary">{{ __('Player edit') }}</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{ Form::model($player,['route' => ['housekeeping.player.update',$player->id],'method' => 'put']) }}

            <div class="form-group">
                {{ Form::label('username', __('Username')) }}
                {{ Form::text('username',null, ['class' => 'form-control']) }}
                {!! $errors->first('username', '<p class="help-block text-danger">:message</p>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('motto', __('Motto')) }}
                {{ Form::text('motto',null, ['class' => 'form-control']) }}
                {!! $errors->first('motto', '<p class="help-block text-danger">:message</p>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('credits', __('Credits')) }}
                {{ Form::text('credits',null, ['class' => 'form-control']) }}
                {!! $errors->first('credits', '<p class="help-block text-danger">:message</p>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('duckets', __('Duckets')) }}
                {{ Form::text('duckets',$player->duckets->amount, ['class' => 'form-control']) }}
                {!! $errors->first('duckets', '<p class="help-block text-danger">:message</p>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('diamonds', __('Diamonds')) }}
                {{ Form::text('diamonds',$player->diamonds->amount, ['class' => 'form-control']) }}
                {!! $errors->first('diamonds', '<p class="help-block text-danger">:message</p>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('rank', __('Rank')) }}
                {{ Form::text('rank',null, ['class' => 'form-control']) }}
                {!! $errors->first('rank', '<p class="help-block text-danger">:message</p>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('ip_current', __('Ip current')) }}
                {{ Form::text('ip_current',null, ['class' => 'form-control', 'disabled' => 'disabled', 'readonly' => 'readonly']) }}
            </div>

            <div class="form-group">
                {{ Form::label('ip_register', __('Ip register')) }}
                {{ Form::text('ip_register',null, ['class' => 'form-control', 'disabled' => 'disabled', 'readonly' => 'readonly']) }}
            </div>

            {{Form::submit(__('Update'), ['class' => 'btn btn-success float-right'])}}

            {{ Form::button(__('Disconnect'), ['class' => 'btn btn-warning float-right mr-1', 'onclick' => 'disconnectUser()']) }}

            {{ Form::close() }}
        </div>
    </div>
@endsection

<script>
    function disconnectUser() {

        $.post('{{ route('housekeeping.player.disconnectUserAjax') }}', {'user_id' : '{{ $player->id }}'}).done(function (data) {
            alert('{{ __('Player is disconnected') }}')
        });
    }
</script>
