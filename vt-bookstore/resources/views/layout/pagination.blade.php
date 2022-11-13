<nav aria-label="Page navigation example">
    <ul
        class="pagination pagination__custom justify-content-md-center flex-nowrap flex-md-wrap overflow-auto overflow-md-visble">
        @php
            $pageAmount = ceil($paginator->total() / $paginator->perPage()) ;
        @endphp
        <li class="flex-shrink-0 flex-md-shrink-1 page-item"><a class="page-link"
                href="{{ $paginator->previousPageUrl() }}">Previous</a>
        </li>
        @for ($i = 1; $i <= $pageAmount; $i++)
            <li @class(['flex-shrink-0', 'flex-md-shrink-1', 'page-item', 'active'=> ($i == $paginator->currentPage())])>
                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <li class="flex-shrink-0 flex-md-shrink-1 page-item"><a class="page-link"
                href="{{ $paginator->nextPageUrl() }}">Next</a>
        </li>
    </ul>
</nav>