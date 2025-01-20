<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Reserva;
use Illuminate\Http\Request;

class GarcomController extends Controller
{
    public function mostrarPedidos() {
        $dados = Pedido::paginate(10);
        return view('garcom.pedidos', compact('dados'));
    }

    public function mostrarClientes() {
        $dados = Reserva::paginate(10);
        return view('garcom.clientes', compact('dados'));
    }
}
