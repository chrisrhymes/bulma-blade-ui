@if ($paginator->hasPages())
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">

        @if ($paginator->onFirstPage())
            <a class="pagination-previous" disabled>Previous</a>
        @else
            <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}">Previous</a>
        @endif

        @if ($paginator->hasMorePages())
            <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}">Next Page</a>
        @else
            <a class="pagination-next" disabled>Next Page</a>
        @endif

    </nav>
@endif
