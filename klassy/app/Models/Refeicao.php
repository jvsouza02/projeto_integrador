<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CarrinhoItens;
use App\Models\PedidoItens;


class Refeicao extends Model
{

    protected $table = 'refeicoes';
    protected $fillable = ['nome', 'descricao', 'categoria', 'preco', 'disponivel', 'imagem'];

    public function carrinhoItens() {
        return $this->hasMany(CarrinhoItens::class, 'idRefeicao');
    }

    public function pedidoItem() {
        return $this->hasMany(PedidoItens::class, 'idRefeicao');
    }
}
