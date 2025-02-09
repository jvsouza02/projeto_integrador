<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Carrinho;
use App\Models\Refeicao;

class CarrinhoItens extends Model
{
    protected $table = 'carrinho_itens';
    protected $primaryKey = 'idCarrinhoItem';

    protected $fillable = [
        'id',
        'idCarrinho',
        'idRefeicao',
        'quantidade',
    ];

    public function carrinho() {
        return $this->belongsTo(Carrinho::class, 'idCarrinho');
    }

    public function refeicao() {
        return $this->belongsTo(Refeicao::class, 'idRefeicao');
    }
}
