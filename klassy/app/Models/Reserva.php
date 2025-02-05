<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable = [
        'idCliente', 'id_mesa', 'nome', 'email', 'telefone', 'data', 'hora', 'observacao'
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

    public function mesa() {
        return $this->belongsTo(Mesa::class, 'idMesa');
    }
}
