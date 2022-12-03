<?php

namespace App\Http\Livewire\Site;

use App\Models\Cardapio\ApiClient;
use Livewire\Component;

class CardapioComponent extends Component
{
    public $categoria_id = null;
    public $page = null;
    public $next = 1;
    public $cep, $cidade, $bairro, $uf, $logradouro;
    public $qtd_produto, $nome_categoria, $nome_produto;

    public function render()
    {
        $apiClient = new ApiClient();

        $resource = $apiClient->produtoRequest($this->page  ?? null, $this->categoria_id ?? null);
        $data = json_decode($resource["data"]);

        $produtos = $data->data->produtos;

        $categorias = $data->data->categorias;
        return view('livewire.site.cardapio-component', compact('produtos', 'categorias'));
    }

    public function filtroCategoria($id = "")
    {
        $this->categoria_id = $id;
        $this->page = null;
    }

    public function onPange($page)
    {

        $this->page = $page;
        $this->next = $page;
    }

    public function modal()
    {

    }

    public function consultarCep()
    {//buscarCep
        $apiClientCep = new ApiClient();
        $response = $apiClientCep->buscarCep($this->cep);

        $data = json_decode($response["data"]);
        if(isset($data->cep)){
            $this->cidade = isset($data->localidade) ? $data->localidade : null;
            $this->bairro = isset($data->bairro) ? $data->bairro : null;
            $this->uf = isset($data->uf) ? $data->uf : null;
            $this->logradouro = isset($data->logradouro) ? $data->logradouro : null;
        }
    }
}
