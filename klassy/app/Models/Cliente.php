<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['idUsuario'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }

    public function reserva() {
        return $this->hasMany(Reserva::class, 'idCliente');
    }

    public function pedido() {
        return $this->hasMany(Pedido::class, 'idCliente');
    }

    public function carrinho() {
        return $this->hasMany(Carrinho::class, 'idCliente');
    }

    public function contato() {
        return $this->hasMany(Contato::class, 'idCliente');
    }
}
