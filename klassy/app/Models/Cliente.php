<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function reserva() {
        return $this->hasMany(Reserva::class, 'id_cliente');
    }

    public function pedido() {
        return $this->hasMany(Pedido::class, 'id_cliente');
    }

    public function carrinho() {
        return $this->hasMany(Carrinho::class, 'id_cliente');
    }

    public function contato() {
        return $this->hasMany(Contato::class, 'id_cliente');
    }
}
