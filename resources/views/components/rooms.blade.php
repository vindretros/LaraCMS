<div class="card">
    <div class="card-body">
        <div class="card-top"><span>{{ __('Active rooms') }}</span></div>
        @foreach ($rooms as $room)
            <div class="randomusers p-2">
                <img onclick="join_room({{$room->id}})" class="randomusersavatar" src="{{ asset('images/icon/'.\App\Models\Website\CmsSettings::roomIcon($room->users)) }}" data-toggle="tooltip" data-placement="top" title="{{$room->name}} - {{ $room->owner_name }}">
            </div>
        @endforeach
    </div>
</div>

@section('scripts')
    @parent
    <script>
        function join_room(room_id) {
            $.post('{{ route('rcon.join.room') }}', {room_id:room_id}).done(function (data) {
                if(data !== 'OK') {
                    window.open('{{ route('client') }}?room_id=' + room_id);
                } else {
                    alert('{{__('You have have been forwarded')}}')
                }
            }).fail(function (data) {
                window.open('{{ route('client') }}?room_id=' + room_id);
            });
        }
    </script>

@endsection
