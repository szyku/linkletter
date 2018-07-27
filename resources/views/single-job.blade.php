@extends('layout')
@section('content')
    <div class="link-wrapper">
        <div class="container-fluid">
            <div class="col-sm">
                @include('dispatch-group.dispatch-group')
                [<a href="{{route('home')}}">Return to homepage</a>]
            </div>
        </div>
    </div>
@endsection
