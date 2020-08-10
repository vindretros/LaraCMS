<div class="card">
    <div class="card-body">
        <div class="card-top"><span>{{ __('Last created users') }}</span> <span class="float-right">{{ __('Referred by you') }}: {{ Auth::user()->referrals->count() }}</span> </div>
        @foreach ($lastCreatedUsers as $user)
            <div class="randomusers">
                <img class="randomusersavatar" src="https://www.habbo.nl/habbo-imaging/avatarimage?figure={{$user->look}}&amp;head_direction=3&amp;gesture=sml&amp;size=m&amp;headonly=1" data-toggle="tooltip" data-placement="top" title="{{$user->username}}, {{ \Carbon\Carbon::parse($user->account_created)->format('d-m-Y H:i:s') }} ">
            </div>
        @endforeach
    </div>
</div>
