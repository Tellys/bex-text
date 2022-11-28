<?php

namespace App\Http\Livewire\Pedidos;

use Livewire\Component;

class Edit extends Component
{
    public int $pedido;

    public function render()
    {
        return view('livewire.pedidos.edit');
    }
}
