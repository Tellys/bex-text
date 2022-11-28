<?php

namespace App\Http\Livewire\Pedidos;

use Livewire\Component;
use App\Models\PedidosComprar;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use RalphJSmit\Livewire\Urls\Facades\Url;
use \Illuminate\Session\SessionManager;

class Visualizar extends Component
{
    use Actions;
    public $pedido_id;
    public $produto_id;
    public $produto_price;
    public $produto_price_total;
    public $produto_quantidade = 0;
    public string $search = '';
    public $inputs = [];
    public $i = 1;

    public $request;

    public function render(Request $requset)
    {
        if(!empty($requset->pedidos_id)) session()->flash('pedidos_id', $requset->pedidos_id);
        $pedido_id = $requset->pedidos_id ?? session('pedidos_id');

        return view(
            'livewire.pedidos.visualizar', 
            [
            'produtos'=> Produto::orderBy('name','DESC')
            //->when($this->search, fn($q)=> $q->where('name','like' ,'%'.$this->search.'%') )
            ->get()
            //->paginate('10') 
            ])
            ->with('pedidosComprar', 
                PedidosComprar::orderBy('id','DESC')
                ->where('pedido_id', $pedido_id)
                ->get()
            )
            ->with('pedido', $pedido_id)
        ;
    }

}
