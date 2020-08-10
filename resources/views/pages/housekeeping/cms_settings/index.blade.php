@extends('layouts.housekeeping')

@section('title', __('Cms settings overview'))

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Cms settings overview') }}</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-0 font-weight-bold text-primary">{{ __('Cms settings') }}</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>{{ __('Key') }}</th>
                        <th>{{ __('Value') }}</th>
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
                ajax: '{{route('housekeeping.cms_settings.indexAjax')}}',
                columns: [
                    {data: 'key'},
                    {data: 'value'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
