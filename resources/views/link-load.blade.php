@each('dispatch-group', $dispatchGroups, 'dispatchGroup')
<a id="item-loader" href="{{ route('load', ['offset' => $nextOffset]) }}">[Click to load more awesome] 👊</a>