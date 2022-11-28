<?php

namespace App\Http\Livewire\Pedidos;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Home extends Component
{
    public string $status;
    public int $pedido;
    public int $search = 0;

    public function render()
    {
        return view('livewire.pedidos.home', [
            'pedidos'=> \App\Models\Pedidos::orderBy('id','DESC')
                ->when($this->search, fn($q)=> $q->where('id',$this->search) )
                ->paginate('10')
        ]);
    }

    public function new()
    {
        // cria o pedido
        $pedidos = \App\Models\Pedidos::create(['user_id'=>Auth::id()]);

        // abre a inclusão de produtos
        return Redirect::to("/pedidos/comprar/$pedidos->id");      

        /* #emite um evento de crate do produto
        $this->emit('Pedidos::create');
        $this->clean(); */
    }

    public function message(Pedido $pedido )
    {
        $this->dialog()->confirm([
            'title'       => 'Ola, você esta preste a deletar o pedido nº '.strtoupper($produto->name),
            'description' => 'Deseja continuar?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Sim, deletar',
                'method' => 'delete',
                'params' => $pedido,
            ],
            'reject' => [
                'label'  => 'Não desejo, cancelar',
                'method' => 'render',
            ],
        ]);
    }

    public function delete($pedido)
    {
        Pedido::where('id', $pedido)->delete();
        $this->notification()->notify([
            'title'       => 'Sucesso!',
            'description' => 'Seu pedido foi deletado',
            'icon'        => 'success',
            'timeout'     =>    1000
        ]);

        $this->emit('Pedido::delete');
    }
}
