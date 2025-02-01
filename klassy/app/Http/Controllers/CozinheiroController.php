<?php

namespace App\Http\Controllers;

use App\Models\Cozinheiro;
use App\Models\Pedido;
use App\Models\PedidoItens;
use Illuminate\Http\Request;

class CozinheiroController extends Controller
{
    public function mostrarPedidos() {
        $dados = PedidoItens::paginate(10);
        return view('cozinheiro.pedidos', compact('dados'));
    }

}
