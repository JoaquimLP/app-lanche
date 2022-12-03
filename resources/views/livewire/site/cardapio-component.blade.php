<section class="py-4 overflow-hidden">
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-12 row mx-auto text-center mt-7 mb-3">
                <div class="col-lg-6 d-flex justify-content-end">
                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Cardápio</h5>
                </div>

                <div class="col-lg-6 d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Monte o seu pedido
                    </button>
                </div>

            </div>
            <div class="col-lg-auto d-none d-lg-block mx-auto text-center mb-3">
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <button type="button" wire:click="filtroCategoria" value=""
                        class="btn text-dark btn-outline-primary @if (empty($categoria_id)) active @endif">Todos</button>
                    @foreach ($categorias as $categoria)
                        <button type="button" wire:click="filtroCategoria({{ $categoria->codigo }})" value=""
                            class="btn text-dark btn-outline-primary @if ($categoria_id == $categoria->codigo) active @endif">{{ $categoria->categoria }}</button>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-auto d-block d-lg-none mx-auto mb-3">
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#filtros" role="button"
                    aria-expanded="false" aria-controls="filtros">
                    filtros
                </a>
                <div wire:ignore.self class="collapse my-2" id="filtros">
                    <div class="list-group">
                        <a href="#" wire:click="filtroCategoria"
                            class="list-group-item list-group-item-action  @if (empty($categoria_id)) active @endif">
                            Todos
                        </a>
                        @foreach ($categorias as $categoria)
                            <a href="#" wire:click="filtroCategoria({{ $categoria->codigo }})"
                                class="list-group-item list-group-item-action @if ($categoria_id == $categoria->codigo) active @endif">
                                {{ $categoria->categoria }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row gx-3 text-center justify-content-center align-items-center my-5">
                    <div wire:loading>
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    @foreach ($produtos->data as $item)
                        <div class="col-sm-6 col-md-3 mb-5 h-100">
                            <div class="card card-span h-100 rounded-3" style="height: 452px !important;">
                                <img class="img-fluid rounded-3 h-100"
                                    src="{{ 'http://localhost:8001/storage/' . $item->image }}"
                                    alt="{{ $item->produto }}"
                                    style="height: 273px !important;
                                object-fit: cover;" />
                                <div class="card-body ps-0">
                                    <h5 class="fw-bold text-1000 text-truncate mb-1">{{ $item->produto }}</h5>
                                    <div>
                                        <span class="text-warning me-2"><i class="fas fa-map-marker-alt"></i></span>
                                        <span class="text-primary">{{ $item->descricao }}</span>
                                    </div>
                                    <span class="text-1000 fw-bold">R$
                                        {{ number_format($item->preco, 2, ',', ' ') }}</span>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <a class="btn btn-lg btn-danger" href="#!" role="button">
                                    Fazer pedido
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <nav aria-label="...">
                        <ul class="pagination">
                            @foreach ($produtos->links as $key => $item)
                                @if ($item->label == "&laquo; Previous")
                                    <li wire:click="onPange({{ $next - 1 }})"  class="page-item @if(!isset($item->url)) disabled @endif ">
                                        <a class="page-link" href="#" tabindex="-1">Anterior</a>
                                    </li>
                                @endif
                                @if (isset($item->url) && !in_array($item->label, [ "Next &raquo;", "&laquo; Previous"]))
                                    <li  wire:click="onPange({{ (int) $item->label }})"  class="page-item @if($item->active) active @endif"><a class="page-link" href="#">{{$item->label}}</a></li>
                                @endif
                                @if ($item->label == "Next &raquo;")
                                    <li wire:click="onPange({{ $next + 1 }})" class="page-item @if(!isset($item->url)) disabled @endif ">
                                        <a class="page-link" href="#">Próximo</a>
                                    </li>
                                @endif
                            @endforeach

                        </ul>
                    </nav>
                    {{-- {{dd($produtos->links)}}
                    @foreach ($produtos->links as $item)
                        {{}}
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div><!-- end of .container-->
    @include("livewire.site.modal")
</section>
