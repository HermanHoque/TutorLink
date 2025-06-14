


@php
    $paginator = $paginator ?? null;
@endphp


@if ($paginator && $paginator->hasPages()) 
    <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation example" class="p-3 rounded">
                <ul class="pagination mb-0"> 

                    {{-- Botão "Anterior" --}}
                    <li class="page-item {{ $perfil_esps->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $perfil_esps->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    {{-- Números das páginas --}}
                    @for ($i = 1; $i <= $perfil_esps->lastPage(); $i++)
                        <li class="page-item {{ $perfil_esps->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $perfil_esps->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Botão "Próximo" --}}
                    <li class="page-item {{ !$perfil_esps->hasMorePages() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $perfil_esps->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>

                </ul>
            </nav>
    </div>
@endif



            