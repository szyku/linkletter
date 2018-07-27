@extends('layout')
@section('content')
    <div class="link-wrapper">
        <div class="container-fluid">
            <div class="col-sm">
                @each('dispatch-group.dispatch-group', $dispatchGroups, 'dispatchGroup')
                @component('loader')
                    {{ route('loadGroups', ['offset' => config('view.items_per_batch')]) }}
                @endcomponent
            </div>
        </div>
    </div>
@endsection
