<ul class="list-unstyled">
    @each('link.link', $links, 'link')
</ul>
@component('loader')
    @slot('text')Gimme those links!@endslot
    {{ route('loadTagLinks', ['offset' => $offset, 'tag' => $tag->slug]) }}
@endcomponent