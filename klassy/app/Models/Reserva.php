<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable = [
        'id_cliente', 'id_mesa', 'nome', 'email', 'telefone', 'data', 'hora', 'observacao'
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function mesa() {
        return $this->belongsTo(Mesa::class, 'id_mesa');
    }
}
