<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    protected $primaryKey = 'idFuncionario';
    protected $fillable = [
        'cargo', 'salario', 'foto', 'idUsuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario', 'id');
    }
}
