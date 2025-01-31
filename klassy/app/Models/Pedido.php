<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\PedidoItens;
use App\Models\Pagamento;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = ['id_cliente', 'quantidade', 'valor_total', 'status'];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function pedidoItens() {
        return $this->hasMany(PedidoItens::class, 'id_pedido');
    }

    public function pagamengo() {
        return $this->hasOne(Pagamento::class, 'id_pedido');
    }
}
