<div class="col-md-6">
    <label for="inputEmail4" class="form-label">Tipo do produto</label>
    <select wire:model.defer="nome_categoria"  class="form-select" aria-label="Default select example">
        <option selected>selecione</option>
        @foreach ($categorias as $categoria)
            <option value="{{$categoria->codigo}}">{{ $categoria->categoria }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-6">
    <label for="inputEmail4" class="form-label">Tipo do produto</label>
    <select wire:model.defer="nome_produto"  class="form-select" aria-label="Default select example">
        <option selected>selecione</option>
        @foreach ($produtos->data as $item)
            <option value="{{$item->codigo}}">{{ $item->produto }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4">
    <label for="inputCity" class="form-label">Quantidade</label>
    <input wire:model.defer="qtd_produto" type="text" class="form-control" id="inputCity">
</div>
