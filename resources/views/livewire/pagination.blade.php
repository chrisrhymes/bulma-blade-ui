<div>
    @if ($paginator->hasPages())
        <nav class="pagination">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="pagination-previous" aria-disabled="true" disabled>
                    @lang('pagination.previous')
                </a>
            @else
                <a class="pagination-previous" wire:click="previousPage" wire:loading.attr="disabled" wire:key="previousPage">
                    @lang('pagination.previous')
                </a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="pagination-next" wire:click="nextPage" wire:loading.attr="disabled" wire:key="nextPage">
                    @lang('pagination.next')
                </a>
            @else
                <a class="pagination-next" aria-disabled="true" disabled>
                    @lang('pagination.next')
                </a>
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
                                <li><a wire:click="goToPage({{ $page }})" wire:key="goToPage{{ $page }}" class="pagination-link" aria-label="Goto page {{ $page }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </ul>

        </nav>
    @endif
</div>
