<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Carrinho;
use App\Models\Refeicao;

class CarrinhoItens extends Model
{
    protected $table = 'carrinho_itens';

    protected $fillable = [
        'id',
        'id_carrinho',
        'id_refeicao',
        'quantidade',
    ];

    public function carrinho() {
        return $this->belongsTo(Carrinho::class, 'id_carrinho');
    }

    public function produto() {
        return $this->belongsTo(Refeicao::class, 'id_refeicao');
    }
}
