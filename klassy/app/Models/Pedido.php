<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'id_cliente',
        'refeicao',
        'preco',
        'quantidade',
        'status',
    ];

    function cliente() {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
