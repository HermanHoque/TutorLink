


@php
    $paginator = $paginator ?? null;
@endphp


@if ($paginator && $paginator->hasPages()) 
    <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation example" class="p-3 rounded">
                <ul class="pagination mb-0"> 

                    {{-- Botão "Anterior" --}}
                    <li class="page-item {{ $tutores->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $tutores->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    {{-- Números das páginas --}}
                    @for ($i = 1; $i <= $tutores->lastPage(); $i++)
                        <li class="page-item {{ $tutores->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $tutores->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Botão "Próximo" --}}
                    <li class="page-item {{ !$tutores->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $tutores->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>

                </ul>
            </nav>
    </div>
@endif



            