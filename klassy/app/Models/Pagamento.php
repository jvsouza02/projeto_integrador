<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $table = 'pagamentos';
    protected $fillable = ['id', 'idPedido', 'valor'];

    public function pedido() {
        return $this->belongsTo(Pedido::class, 'idPedido');
    }
}
