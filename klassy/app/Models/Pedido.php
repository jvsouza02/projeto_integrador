<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'id_usuario',
        'refeicao',
        'preco',
        'quantidade',
        'status',
    ];

    function cliente() {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
