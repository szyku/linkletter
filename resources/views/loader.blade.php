<button type="button" class="btn btn-primary" id="loader" data-url="{{ $slot }}">
    <span class="emoji">👉</span> {{ $text or 'Load more awesome'}} <span class="emoji">👈</span>
    <span class="loader invisible"> <i class="fa fa-cog fa-spin fa-fw"></i><span class="sr-only">Loading...</span></span>
</button>
