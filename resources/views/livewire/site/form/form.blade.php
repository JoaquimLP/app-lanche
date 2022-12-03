<div class="col-md-10">
    <label for="inputEmail4" class="form-label">Nome</label>
    <input type="text" class="form-control" id="inputEmail4">
</div>
<div class="col-md-3">
    <label for="inputEmail4" class="form-label">CEP</label>
    <input wire:model.defer="cep" wire:change="consultarCep" type="text" class="form-control" id="inputEmail4">
</div>
<div class="col-md-4">
    <label for="inputCity" class="form-label">Bairro</label>
    <input wire:model.defer="bairro" type="text" class="form-control" id="inputCity">
</div>
<div class="col-md-3">
    <label for="inputCity" class="form-label">Cidade</label>
    <input wire:model.defer="cidade" type="text" class="form-control" id="inputCity">
</div>
<div class="col-md-2">
    <label for="inputCity" class="form-label">Estado</label>
    <input wire:model.defer="uf" type="text" class="form-control" id="inputCity">
</div>
<div class="col-12">
    <label for="inputAddress2" class="form-label">Endereço</label>
    <input wire:model.defer="logradouro" type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
</div>
<div class="col-md-3">
    <label for="inputCity" class="form-label">Numero</label>
    <input type="text" class="form-control" id="inputCity">
</div>
<div class="col-md-4">
    <label for="inputCity" class="form-label">Complento</label>
    <input type="text" class="form-control" id="inputCity">
</div>
<div class="col-md-12">
    <label for="exampleFormControlTextarea1" class="form-label">Observação</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
