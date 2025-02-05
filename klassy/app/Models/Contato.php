<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'contatos';
    protected $fillable = ['idCliente', 'nome', 'email', 'assunto', 'mensagem'];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }
}
