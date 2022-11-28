<?php

namespace App\Http\Livewire\Pedidos;

use Illuminate\Support\Facades\Redirect;
use App\Models\Pedidos;
use Livewire\Component;
use Actions;

class Create extends Component
{
    public string $status;
    public int $pedido;
    public int $search = 0;


    public function render()
    {
        return view('livewire.pedidos.show', [
            'pedidos'=> \App\Models\Pedidos::orderBy('id','DESC')
                ->when($this->search, fn($q)=> $q->where('id',$this->search) )
                ->paginate('10')
        ]);
        //return view('livewire.pedidos.create');
    }

    public function new()
    {
        // cria o pedido
        $pedido = Pedidos::query()->create(['user_id'=>Auth::id()]);

        // abre a inclusão de produtos
        return Redirect::to("/pedidos/$pedidos");      

        /* #emite um evento de crate do produto
        $this->emit('Pedidos::create');
        $this->clean(); */
    }

    public function save(): void
    {
        $this->validate();
            Pedidos::query()->create([
            'user_id' =>  Auth::id()
        ]);

        #emite um evento de crate do produto
        $this->emit('Pedidos::create');

        $this->clean();
    }

    public function update(int $pedido)
    {
        $pedido = Pedidos::find($pedido);
        if ($pedido) {
            $pedido->status = $this->status;
        }else {
            $this->notification()->notify([
                'title'       => 'Erro',
                'description' => 'Pedido não localizado. Crie um novo pedido',
                'icon'        => 'error',
                'timeout'     =>  2000
    
            ]);
        }
    }
}
