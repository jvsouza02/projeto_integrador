<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CarrinhoItens;

class Carrinho extends Model
{
    protected $table = 'carrinhos';

    protected $fillable = [
        'id',
        'id_cliente',
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function carrinhoItens() {
        return $this->hasMany(CarrinhoItens::class, 'id_carrinho');
    }
}
