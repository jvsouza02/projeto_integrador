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

    public function fazerReserva(Request $request) {
        $request->validate([
            'id_cliente' => 'nullable|integer',
            'nome' => 'required|string',
            'email' => 'required|string|email',
            'telefone' => 'required|string',
            'numero_pessoas' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required|string',
            'message' => 'nullable|string',
        ]);

        $reserva = new Reserva();
        $reserva->nome = $request->nome;
        $reserva->email = $request->email;
        $reserva->telefone = $request->telefone;
        $reserva->numero_pessoas = $request->numero_pessoas;
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
