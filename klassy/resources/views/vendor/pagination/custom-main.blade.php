@if ($paginator->hasPages())
    <ul class="pagination-custom">
        {{-- Link da Página Anterior --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>Anterior</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Anterior</a></li>
        @endif

        {{-- Links das Páginas --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Link da Próxima Página --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Próximo</a></li>
        @else
            <li class="disabled"><span>Próximo</span></li>
        @endif
    </ul>
@endif
