<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use App\Models\Refeicao;

class PedidoItens extends Model
{
    protected $table = 'pedido_itens';

    protected $fillable = [
        'id',
        'id_pedido',
        'id_refeicao',
        'quantidade',
        'valor_unitario',
    ];

    public function pedido() {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }

    public function produto() {
        return $this->belongsTo(Refeicao::class, 'id_refeicao');
    }
}
