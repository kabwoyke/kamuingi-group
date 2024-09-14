@if ($paginator->hasPages())


    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>

    <style>
    .pagination {
    display: flex;
    list-style: none;
    padding: 0;
    justify-content: center;
    margin: 20px 0;
}

.pagination li {
    margin: 0 5px;
}

.pagination li a, .pagination li span {
    display: block;
    padding: 10px 15px;
    text-decoration: none;
    color: #2d6a4f;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.pagination li a:hover {
    background-color: #2d6a4f;
}

.pagination li.active span {
    background-color: #2d6a4f;
    color: white;
    border-color: #2d6a4f;
}

.pagination li.disabled span, .pagination li.disabled a {
    color: #081c15;
    pointer-events: none;
    cursor: not-allowed;
}

.pagination li a {
    transition: background-color 0.3s ease;
    font-size: 1.6rem;
}

.pagination-container{
    display: flex;
    justify-content: space-between;

}
    </style>

@endif



{{--
<style>
    .pagination{
    list-style: disc;
}
</style> --}}
