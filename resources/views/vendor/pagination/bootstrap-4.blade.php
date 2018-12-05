@if ($paginator->hasPages())
<div class="bg-grey-light p-4 rounded-b">
    <ul class="flex list-reset" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="bg-white disabled rounded-l" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="p-2 block no-underline text-grey-dark" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="bg-white">
                <a class="p-2 block no-underline text-grey-darkest" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="bg-white" aria-disabled="true"><span class="p-2 block no-underline text-grey-dark">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="bg-white" aria-current="page"><span class="p-2 block no-underline text-blue">{{ $page }}</span></li>
                    @else
                        <li class="bg-white"><a class="p-2 block no-underline text-grey-darkest" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="bg-white rounded-r">
                <a class="p-2 block no-underline text-grey-darkest" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="bg-white rounded-r" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="p-2 block no-underline text-grey-dark" aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
</div>
@endif
