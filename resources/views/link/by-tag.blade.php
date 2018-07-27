@extends('layout')
@section('content')
    <section class="list-group">
        <div class="link-wrapper">
            <div class="container-fluid">
                <div class="col-sm">
                    <article class="dispatch-group">
                        <section class="list-group">
                            <header>
                                <h2>Browsing by tag - {{$tag->name}}</h2>
                            </header>
                            <main>
                                <ul class="list-unstyled">
                                    @each('link.link', $links, 'link')
                                </ul>
                                @component('loader')
                                    @slot('text')Gimme those links!@endslot
                                    {{ route('loadTagLinks', ['offset' => $offset, 'tag' => $tag->slug]) }}
                                @endcomponent
                            </main>
                            <footer>
                                [<a href="{{route('home')}}">Return to homepage</a>]
                            </footer>
                        </section>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection