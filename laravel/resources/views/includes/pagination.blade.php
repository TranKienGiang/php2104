
@if ($paginator->hasPages())
<div class="row">
    <div class="col-lg-12">
        <div class="product__pagination">
            {{-- Previous Page link --}}
            @if ($paginator->onFirstPage())
                    <a aria-disabled="true" class="disabled" aria-hidden="true">&lt;</a>
            @else
                    <a href="{{ $paginator->previousPageUrl() }}" >&lt;</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="disabled" aria-disabled="true"><span>{{ $element }}</span></a>
                @endif

                {{-- Array Of anks --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="active " aria-current="page"><span>{{ $page }}</span></a>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page ank --}}
            @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}">&gt;</a>
            @else
                <a class="disabled" aria-disabled="true" >
                    <span aria-hidden="true">&gt;</span>
                </a>
            @endif
        </div>
    </div>
</div>
@endif
