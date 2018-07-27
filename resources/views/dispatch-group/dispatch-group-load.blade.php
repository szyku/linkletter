@each('dispatch-group.dispatch-group', $dispatchGroups, 'dispatchGroup')
@component('loader')
    {{ route('loadGroups', ['offset' => $nextOffset]) }}
@endcomponent
