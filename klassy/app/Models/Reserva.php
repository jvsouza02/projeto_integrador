<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $fillable = ['nome', 'email', 'telefone', 'numero_pessoas', 'data', 'hora', 'observacao'];
}
