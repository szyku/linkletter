<section class="list-group">
    <header>
        <h3>{{$group->group_name}}</h3>
    </header>
    <main>
        <ul class="list-unstyled">
            @each('link', $group->links, 'link')
        </ul>
    </main>
</section>