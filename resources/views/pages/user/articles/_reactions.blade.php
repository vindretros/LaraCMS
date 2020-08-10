<hr>
<div class="card">
    <div class="card-header bg-secondary text-white">
        {{ __('Reactions') }}
    </div>
    <div class="card-body">
        <div class="row">
            @forelse($article->reactions as $reaction)
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <div class="row">
                                <div class="col-md-12">
                                    <img
                                        src="https://www.habbo.nl/habbo-imaging/avatarimage?figure={{ $reaction->user->look }}"
                                        alt="{{ $reaction->user->username }}">
                                </div>
                                <div class="col-md-12">
                                    <span class="font-weight-bolder">{{ $reaction->user->username }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 my-auto rounded p-2 reaction" style="background-color: lightgray;">
                            <span>{{ $reaction->text }}</span>
                        </div>
                        <div class="col-md-1 my-auto">
                            @if(Auth::user()->rank > 3)
                                {{ Form::open(['route' => ['article.reaction.delete', $reaction],'method' => 'post']) }}
                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('{{ __('Are you sure you want delete this?') }}')"><span
                                        class="fa fa-trash"></span></button>
                                {{ Form::close() }}
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center">
                    <span>{{ __('No reactions found') }}</span>
                </div>
            @endforelse
        </div>
    </div>
</div>

<hr>
<div class="card">
    <div class="card-header bg-danger text-white">
        {{ __('Write your reaction') }}
    </div>
    {{ Form::open(['route'=> ['article.reaction.create',$article],'method' => 'post']) }}
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2 text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <img
                                    src="https://www.habbo.nl/habbo-imaging/avatarimage?figure={{ Auth::user()->look }}"
                                    alt="{{ Auth::user()->username }}">
                            </div>
                            <div class="col-md-12">
                                <span class="font-weight-bolder">{{ Auth::user()->username }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 my-auto rounded p-2" style="background-color: lightgray;">
                        {{ Form::textarea('text', null, ['class' => 'form-control', 'rows' => 3]) }}
                    </div>
                    <div class="col-md-2 my-auto">
                        {{ Form::submit(__('Send'),['class' => 'btn btn-success btn-block', 'onclick' => 'return confirm("'. __('Are you sure?') .'")']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>
