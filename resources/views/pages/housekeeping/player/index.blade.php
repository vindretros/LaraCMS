@extends('layouts.housekeeping')

@section('title', __('Players overview'))

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Players overview') }}</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-2">
                    <h4 class="m-0 font-weight-bold text-primary">{{ __('Players') }}</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Username') }}</th>
                        <th>{{ __('Rank') }}</th>
                        <th>{{ __('Credits') }}</th>
                        <th>{{ __('Duckets') }}</th>
                        <th>{{ __('Diamonds') }}</th>
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
                ajax: '{{route('housekeeping.player.indexAjax')}}',
                columns: [
                    {data: 'id'},
                    {data: 'username'},
                    {data: 'rank'},
                    {data: 'credits'},
                    {data: 'duckets'},
                    {data: 'diamonds'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
