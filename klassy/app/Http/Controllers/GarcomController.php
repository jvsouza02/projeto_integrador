<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoItens;
use App\Models\Reserva;
use Illuminate\Http\Request;

class GarcomController extends Controller
{
    public function mostrarPedidos() {
        $dados = PedidoItens::paginate(10);
        return view('garcom.pedidos', compact('dados'));
    }

    public function mostrarClientes() {
        $dados = Reserva::paginate(10);
        return view('garcom.clientes', compact('dados'));
    }

    public function fazerReserva(Request $request) {
        $request->validate([
            'id_cliente' => 'nullable|integer',
            'id_mesa' => 'required|integer',
            'nome' => 'required|string',
            'email' => 'required|string|email',
            'telefone' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'message' => 'nullable|string',
        ]);

        $reserva = new Reserva();
        $reserva->id_mesa = $request->id_mesa;
        $reserva->nome = $request->nome;
        $reserva->email = $request->email;
        $reserva->telefone = $request->telefone;
        $reserva->data = $request->date;
        $reserva->hora = $request->time;
        $reserva->observacao = $request->message;
        $reserva->save();

        return redirect()->route('garcom.clientes');
    }

    public function cancelarReserva($id) {
        $reserva = Reserva::find($id);
        $reserva->delete();
        return redirect()->route('garcom.clientes');
    }
}
