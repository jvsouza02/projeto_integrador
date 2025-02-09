<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use App\Models\Refeicao;

class PedidoItens extends Model
{
    protected $table = 'pedido_itens';
    protected $primaryKey = 'idPedidoItem';

    protected $fillable = [
        'id',
        'idPedido',
        'idRefeicao',
        'quantidade',
        'valorUnitario',
    ];

    public function pedido() {
        return $this->belongsTo(Pedido::class, 'idPedido');
    }

    public function refeicao() {
        return $this->belongsTo(Refeicao::class, 'idRefeicao');
    }
}
