@if ($paginator->hasPages())
    <footer aria-label="Page navigation example">
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('件中') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('～') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('件表示') !!}
                </p>
            </div>
        <ul class="inline-flex items-center -space-x-px">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="block px-4 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg">
                        <span class="sr-only">@lang('pagination.previous')</span>
                        <span aria-hidden="true">&lsaquo;</span>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="block px-4 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <span class="sr-only">@lang('pagination.previous')</span>
                        <span aria-hidden="true">&lsaquo;</span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="px-4 py-2 leading-tight text-gray-500 bg-white border border-gray-300">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="z-10 px-4 py-2 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="px-4 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="block px-4 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <span class="sr-only">@lang('pagination.next')</span>
                        <span aria-hidden="true">&rsaquo;</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="block px-4 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg">
                        <span class="sr-only">@lang('pagination.next')</span>
                        <span aria-hidden="true">&rsaquo;</span>
                    </span>
                </li>
            @endif
        </ul>
    </footer>
@endif