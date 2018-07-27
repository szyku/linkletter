<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page - Start Bootstrap Theme</title>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>

<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Linkletter.io</h1>
        <p class="lead">The best dev news every week!</p>
    </div>
</div>
<div class="link-wrapper">
    <div class="container-fluid">
        <div class="col-sm">
            @each('dispatch-group', $dispatchGroups, 'dispatchGroup')
            <a id="item-loader" href="{{ route('load', ['offset' => config('view.items_per_batch')]) }}">[Click to load more awesome] 👊</a>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>
