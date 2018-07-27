@extends('layout')
@section('content')
    <div class="link-wrapper">
        <div class="container-fluid">
            <div class="col-sm">
                @each('dispatch-group', $dispatchGroups, 'dispatchGroup')
                @component('loader')
                    {{ route('load', ['offset' => config('view.items_per_batch')]) }}
                @endcomponent
            </div>
        </div>
    </div>
    <button id="top-button" title="Go to top" class="btn btn-secondary"><i class="fa fa-angle-double-up"
                                                                           style="font-size:36px"></i></button>
@endsection
