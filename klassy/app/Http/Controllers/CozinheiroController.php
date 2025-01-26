<?php

namespace App\Http\Controllers;

use App\Models\Cozinheiro;
use App\Models\Pedido;
use Illuminate\Http\Request;

class CozinheiroController extends Controller
{
    public function mostrarPedidos() {
        $dados = Pedido::paginate(10);
        return view('cozinheiro.pedidos', compact('dados'));
    }
    
}
