@extends('layouts.housekeeping')

@section('title', __('News overview'))

@section('content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('News overview') }}</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-2">
                    <h4 class="m-0 font-weight-bold text-primary">{{ __('News') }}</h4>
                </div>
                <div class="col-md-10">
                    <a href="{{route('housekeeping.news.create')}}" class="btn btn-success float-right">{{ __('Create') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Content') }}</th>
                        <th>{{ __('Created at') }}</th>
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
                ajax: '{{route('housekeeping.news.indexAjax')}}',
                columns: [
                    {data: 'id'},
                    {data: 'title'},
                    {data: 'description'},
                    {data: 'content'},
                    {data: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
