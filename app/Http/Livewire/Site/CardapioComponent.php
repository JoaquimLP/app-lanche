<?php

namespace App\Http\Livewire\Site;

use App\Models\Cardapio\ApiClient;
use Livewire\Component;

class CardapioComponent extends Component
{
    public $categoria_id = null;
    public $page = null;
    public $next = 1;

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
}
