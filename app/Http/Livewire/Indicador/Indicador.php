<?php

namespace App\Http\Livewire\Indicador;

use App\Models\Produto;
use App\Models\Pedidos;
use App\Models\PedidosComprar;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Indicador extends Component
{

    public string $pedido;
    public string $pedidoPrice;
    public string $pedidoCusto;
    public string $pedidoLucro;
    public string $pedidosAbertos;
    public string $pedidosFechados;
    public string $pedidosCancelados;
    
    public string $pedidosComprar;
    public string $quantidadeTotalDeProdutosVendidos;
    public string $pedidosComprarMaisVendidos;
    public string $pedidoCustoMenosVendidos;
    public string $produtoMaisVendido;

    public int $totalProduto;
    public string $produtoMaisCaro;
    public string $produtoMaisBarato;

    protected $listeners = [
        'Produto::create' => '$refresh',
        'Produto::delete' => '$refresh'
    ];


    public function mount()
    {
        $this->totalProduto = Produto::count();

        !$this->totalProduto ? : $this->produtoMaisCaro = Produto::select('name','price')
                                                        ->orderBy('price','desc')->first();

        !$this->totalProduto ? : $this->produtoMaisBarato = Produto::select('name','price')
                                                        ->orderBy('price','asc')->first();


        // qtd total de pedidos
        $this->pedido = Pedidos::count();

        //pedidos abertos
        !$this->pedido ? : $this->pedidosAbertos = Pedidos::select('id','price')->where('status','aberto')->count();

        //pedido fechados
        !$this->pedido ? : $this->pedidosFechados = Pedidos::select('id','price')->where('status','fechado')->count();

        //pedido cancelados
        !$this->pedido ? : $this->pedidosCancelados = Pedidos::select('id','price')->where('status','cancelado')->count();

        //pedido mais barato
        !$this->pedido ? : $this->pedidoPrice = Pedidos::select('id','price')->where('status','fechado')->orderBy('price','desc')->first();

        //pedido mais caro
        !$this->pedido ? : $this->pedidoCusto = Pedidos::select('id','price')->where('status','fechado')->orderBy('price','asc')->first();                                                        

        // qtd total de produtos vendidos
        $this->pedidosComprar = PedidosComprar::count();
        $this->quantidadeTotalDeProdutosVendidos = PedidosComprar::whereNotNull('id')->sum('quantidade');
        //$custo = PedidosComprar::where('pedido_id', $pedido_id)->sum('custo');

        
        //pedido com maior lucro
        //!$this->pedidosComprar ? : $this->pedidoLucro = Pedidos::select('id','price','custo')->orderBy('price','asc')->first();                                                        

        //pedido com menor lurco
        //!$this->pedidosComprar ? : $this->pedidoLucro = Pedidos::select('id','price','custo')->orderBy('price','asc')->first();

        //$this->pedidosComprar = PedidosComprar::count();

        $this->produtoMaisVendido = $this->maisVendidos(1);
        //var_dump((json_decode($this->produtoMaisVendido))[0]->name);
        //$this->produtoMaisVendido = $this->produtoMaisVendido;
    }

    public function maisVendidos($quantidade)
    {
        $ids = PedidosComprar::select('produto_id', DB::raw('count(*) as total'))
                ->groupBy('produto_id')
                ->orderByRaw('count(*) DESC')
                ->limit($quantidade)
                ->pluck('produto_id');

        $produtos = Produto::select('name')->whereIn('id', $ids)->get();
        //return response()->json($produtos);
        return $produtos;
    }

    public function render()
    {
        return view('livewire.indicador.indicador');
    }
}

