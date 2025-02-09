<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\PedidoItens;
use App\Models\Pagamento;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'idPedido';
    protected $fillable = ['idCliente', 'valorTotal', 'status'];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

    public function pedidoItens() {
        return $this->hasMany(PedidoItens::class, 'idPedido');
    }

    public function pagamento() {
        return $this->hasOne(Pagamento::class, 'idPedido');
    }
}
