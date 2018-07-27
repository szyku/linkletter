<li>
    <p>{{ $link->icon }} @each('link-tag', $link->tags, 'tag') {{ $link->description }}</p>
    <cite>Source: <a href="{{$link->url}}">{{$link->url}}</a></cite>
</li>