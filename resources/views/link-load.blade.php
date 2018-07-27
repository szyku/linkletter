@each('dispatch-group', $dispatchGroups, 'dispatchGroup')
@component('loader')
    {{ route('load', ['offset' => $nextOffset]) }}
@endcomponent
