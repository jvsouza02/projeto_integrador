<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CarrinhoItens;

class Carrinho extends Model
{
    protected $table = 'carrinhos';

    protected $fillable = [
        'id',
        'idCliente',
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

    public function carrinhoItens() {
        return $this->hasMany(CarrinhoItens::class, 'idCarrinho');
    }
}
