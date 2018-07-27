<section class="list-group">
    <header>
        @if (isset($unlink) && $unlink === true)
            <h3>{{$group->group_name}}</h3>
        @else
            <h3><a href="{{ route('group', ['slug' => $group->slug]) }}">{{$group->group_name}}</a></h3>
        @endif

    </header>
    <main>
        <ul class="list-unstyled">
            @each('link.link', $group->links, 'link')
        </ul>
    </main>
</section>