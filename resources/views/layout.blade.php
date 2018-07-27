<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Linkletter.io - your weekly WebDev news!</title>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>

<body>
<header>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="display-4"><a href="{{route('home')}}">Linkletter.io</a></h1>
                    <p class="lead">The best dev news every week!</p>
                </div>
                <div class="col-lg-6">
                    <form method="POST" class="sub-form" action="{{ route('subscribe') }}">
                        @csrf
                        <div class="form-group">
                            <input type="who" class="form-control" id="sub"
                                   aria-describedby="emailHelp" name="who"
                                   placeholder="Enter email to subscribe!">
                            <small id="emailHelp" class="form-text text-muted">⭐ We'll never share your email with
                                anyone
                                else. Unsub whenever you want!
                            </small>
                            @if ($errors->any())
                                <ul class="errors list-unstyled list-inline">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            @if (Session::has('success'))
                                <div class="success">{{Session::get('success')}}</div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    @yield('content')
</main>
<footer>
    <button id="top-button" title="Go to top" class="btn btn-secondary"><i class="fa fa-angle-double-up"
</footer>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>
