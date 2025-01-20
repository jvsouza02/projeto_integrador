<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refeicao extends Model
{

    protected $table = 'refeicoes';
    protected $fillable = ['nome', 'descricao', 'categoria', 'preco', 'disponivel', 'imagem'];

    public function carrinhos() {
        return $this->hasMany(Carrinho::class, 'id_refeicao');
    }
}
