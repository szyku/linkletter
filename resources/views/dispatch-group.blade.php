<article class="dispatch-group">
    <header>
        <h2>{{$dispatchGroup->title}}</h2>
    </header>
    <main>
        @each('group', $dispatchGroup->groups, 'group')
    </main>
    <footer>
        This was batched on
        <time>{{ $dispatchGroup->dispatch_at }}</time>
    </footer>
</article>