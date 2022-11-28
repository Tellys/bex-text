<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosComprar extends Model
{
    use HasFactory;
    protected $fillable = [
        'pedido_id',
        'produto_id',
        'quantidade',
        'price',
        'produto_name',
        'custo'
    ];

}
