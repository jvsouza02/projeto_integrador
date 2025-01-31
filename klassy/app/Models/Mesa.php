<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = 'mesas';
    protected $fillable = ['numero', 'status'];

    public function reserva() {
        return $this->hasMany(Reserva::class, 'id_mesa');
    }
}
