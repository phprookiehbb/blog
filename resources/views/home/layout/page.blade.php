@if ($paginator->hasPages())
    <ul class="page-navi" role="navigation">
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <li>
                <a  href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">←</a>
            </li>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="current" aria-current="page"><a class="page-numbers">{{ $page }}</a></li>
                    @else
                        <li><a  href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">→</a>
            </li>
        @endif
        <li class="current"><a>{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}</a></li>
    </ul>
@endif
