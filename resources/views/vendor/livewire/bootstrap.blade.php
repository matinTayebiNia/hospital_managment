@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav class="d-flex justify-items-center justify-content-between" style="display: flex;justify-content: space-between;align-items: center">
            <div class="d-flex justify-content-between flex-fill d-sm-none" style="display: flex;justify-content: space-between;flex: 1 1 auto !important;">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="  page-item disabled" aria-disabled="true">
                            <button class="btn btn-link disabled"> « قبلی </button>
                        </li>
                    @else
                        <li class="page-item">
                            <button type="button" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="btn btn-link" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled">
                                « قبلی
                            </button>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <button type="button" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="btn btn-link" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled">
                                بعدی»</button>
                        </li>
                    @else
                        <li class="  page-item disabled" aria-disabled="true">
                            <button class="btn btn-link disabled"> بعدی»</button>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                <div>
                    <p class="small text-muted">
                        {!! __('نمایش') !!}
                        <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                        {!! __('در صقحه') !!}
                        <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                        {!! __('از') !!}
                        <span class="fw-semibold">{{ $paginator->total() }}</span>
                        {!! __('نتایج') !!}
                    </p>
                </div>

                <div>
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                <span class="btn btn-link" aria-hidden="true">&lsaquo;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a href="#" type="button" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                                        class="btn btn-link" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                                        x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled"
                                        aria-label="@lang('pagination.previous')">&lsaquo;</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li class="page-item disabled" aria-disabled="true"><span class="btn btn-link">{{ $element }}</span></li>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="page-item active" wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}"
                                            aria-current="page"><span class="btn btn-link">{{ $page }}</span></li>
                                    @else
                                        <li class="page-item" wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}">
                                            <a href="#" type="button"
                                                    class="btn btn-link" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                                    x-on:click="{{ $scrollIntoViewJsSnippet }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <li class="page-item">
                                <a href="#" type="button"
                                        dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                                        class="btn btn-link" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" aria-label="@lang('pagination.next')">&rsaquo;</a>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span class="btn btn-link" aria-hidden="true">&rsaquo;</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    @endif
</div>
