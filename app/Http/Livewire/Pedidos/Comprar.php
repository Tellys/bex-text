<?php

namespace App\Http\Livewire\Pedidos;

use Livewire\Component;
use App\Models\Pedidos;
use App\Models\PedidosComprar;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use RalphJSmit\Livewire\Urls\Facades\Url;
use \Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Redirect;

class Comprar extends Component
{
    use Actions;
    public $pedido_id;
    public $produto_id;
    public $produto_price;
    public $produto_name;
    public $custo;
    public $produto_price_total;
    public $produto_quantidade = 0;
    public string $search = '';
    public $inputs = [];
    public $i = 1;

    public $request;

    #escuta todos eventos emitidos e toma uma ação
   /*  protected $listeners=[
        'PedidosComprar::create'=>'$refresh',
        //'PedidosComprar::delete'=>'$refresh'
    ]; */

    protected $rules = [
        'produto_id' => 'required|number',
        'produto_price' => 'required|regex:/^\d+(\.\d{1,2})?$/' //'12' or '12.5' or '12.05'
    ];

    public function render(Request $requset)
    {
        if(!empty($requset->pedidos_id)) session()->flash('pedidos_id', $requset->pedidos_id);
        $pedido_id = $requset->pedidos_id ?? session('pedidos_id');

        return view(
            'livewire.pedidos.comprar', 
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

    public function save($pedido_id, $produto_id, $produto_price, $produto_name, $lucro, Request $requset)
    {        
        session()->flash('pedidos_id', $requset->pedidos_id ?? $pedido_id);

        $r = $this->produto_quantidade[$produto_id];

        if (empty($r) or $r <= 0) {
            $this->notification()->notify([
                'title'       => 'Erro!',
                'description' => 'Campo quantidade deve ser maior que 0',
                'icon'        => 'error',
                'timeout'     => 2000
    
            ]);
        }

        PedidosComprar::create(
            [
                'pedido_id' => $pedido_id, 
                'produto_id' => $produto_id,
                'quantidade' => $r,
                'price' => ($produto_price+($produto_price*($lucro/100))) * $r, 
                'custo' => $produto_price * $r, 
                'produto_name' => $produto_name,
            ]
        );

        $this->notification()->notify([
            'title'       => 'Sucesso!',
            'description' => 'Produto adicionado!',
            'icon'        => 'success',
            'timeout'     => 2000

        ]);

        #emite um evento de crate do produto
        //$this->emit('Produto::create');

        //$this->clean();
    }

    public function delete($pedido_id, $idPedidosComprar)
    {
        session()->flash('pedidos_id', $pedido_id);

        PedidosComprar::where('id', $idPedidosComprar)->delete();
        $this->notification()->notify([
            'title'       => 'Sucesso!',
            'description' => 'Seu produto foi deletado',
            'icon'        => 'success',
            'timeout'     => 2000
        ]);
    }

    public function fecharPedido($pedido_id)
    {
        session()->flash('pedidos_id', $pedido_id);

        $soma = PedidosComprar::where('pedido_id', $pedido_id)->sum('price');
        $custo = PedidosComprar::where('pedido_id', $pedido_id)->sum('custo');

        Pedidos::where('id', $pedido_id)->update(['status'=>'fechado', 'price'=>$soma, 'custo'=>$custo]);
        $this->notification()->notify([
            'title'       => 'Sucesso!',
            'description' => 'Pedido Fechado',
            'icon'        => 'success',
            'timeout'     => 2000
        ]);

        return Redirect::to("/pedidos/visualizar/$pedido_id");      
    }

    public function cancelarPedido($pedido_id)
    {
        session()->flash('pedidos_id', $pedido_id);

        $this->dialog()->confirm([
            'title'       => 'CANCELAR o pedido = '.$pedido_id,
            'description' => 'Deseja continuar?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Sim, Cancelar',
                'method' => 'cancelarPedidoConfirmado',
                'params' => $pedido_id,
            ],
            'reject' => [
                'label'  => 'Desistir',
            ],
        ]);
    }

    public function cancelarPedidoConfirmado($pedido_id)
    {
        session()->flash('pedidos_id', $pedido_id);

        Pedidos::where('id', $pedido_id)->update(['status'=>'cancelado']);
        $this->notification()->notify([
            'title'       => 'Sucesso!',
            'description' => 'Seu Pedido foi CANCELADO',
            'icon'        => 'success',
            'timeout'     => 2000
        ]);
        
        return Redirect::to("pedidos");      
    }

    public function deletarPedido($pedido_id)
    {
        session()->flash('pedidos_id', $pedido_id);

        $this->dialog()->confirm([
            'title'       => 'DELETAR o pedido = '.$pedido_id,
            'description' => 'Deseja continuar?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Sim, deletar',
                'method' => 'deletarPedidoConfirmado',
                'params' => $pedido_id,
            ],
            'reject' => [
                'label'  => 'Desistir',
            ],
        ]);

    }

    public function deletarPedidoConfirmado($pedido_id)
    {
        session()->flash('pedidos_id', $pedido_id);

        PedidosComprar::where('pedido_id', $pedido_id)->delete();

        Pedidos::where('id', $pedido_id)->delete();
        $this->notification()->notify([
            'title'       => 'Sucesso!',
            'description' => 'Seu Pedido foi DELETADO',
            'icon'        => 'success',
            'timeout'     => 2000
        ]);

        return Redirect::to("pedidos");      
    }
}
