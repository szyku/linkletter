@extends('layout')
@section('content')
    <div class="link-wrapper">
        <div class="container-fluid">
            <div class="col-sm">
                @include('group', ['unlink' => true])
                [<a href="{{route('single', ['slug' => $group->dispatchJob->slug])}}">Hop to related issue</a>] [<a href="{{route('home')}}">Return to homepage</a>]
            </div>
        </div>
    </div>
@endsection
