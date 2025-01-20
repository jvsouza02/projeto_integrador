<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Funcionario extends Model
{
    protected $fillable = [
        'cargo', 'salario', 'foto', 'usuario_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
