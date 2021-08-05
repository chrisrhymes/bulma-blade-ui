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

        </nav>
    @endif
</div>
