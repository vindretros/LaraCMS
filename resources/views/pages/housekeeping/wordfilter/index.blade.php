@extends('layouts.housekeeping')

@section('title', __('Players overview'))

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Wordfilter') }}</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-2">
                    <h4 class="m-0 font-weight-bold text-primary">{{ __('Wordfilter') }}</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{ __('Key') }}</th>
                        <th>{{ __('replacement') }}</th>
                        <th>{{ __('Hide') }}</th>
                        <th>{{ __('Report') }}</th>
                        <th>{{ __('Mute') }}</th>
                        <th>{{ __('Edit') }}</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('housekeeping.wordfilter.indexAjax')}}',
                columns: [
                    {data: 'key'},
                    {data: 'replacement'},
                    {data: 'hide'},
                    {data: 'report'},
                    {data: 'mute'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
