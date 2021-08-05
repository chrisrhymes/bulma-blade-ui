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

        <ul class="pagination-list">
            @foreach ($elements as $element)

                @if (is_string($element))
                    <li><span class="pagination-ellipsis">&hellip;</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pagination-link is-current" aria-label="Goto page {{ $page }}">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}" class="pagination-link" aria-label="Goto page {{ $page }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>

    </nav>
@endif
