<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Pedido;
use App\Models\PedidoItens;
use App\Models\Reserva;
use Illuminate\Http\Request;

class GarcomController extends Controller
{
    public function mostrarPedidos() {
        $pedidos = Pedido::paginate(3);
        return view('admin.garcom.pedidos', compact('pedidos'));
    }

    public function mostrarPedidosCliente($id) {
        $pedidos = Pedido::where('idCliente', $id)->paginate(3);
        $reserva = Reserva::where('idReserva', $id)->where('created_at', '>=', date('Y-m-d'))->first();
        return view('admin.garcom.pedidos', compact('pedidos', 'reserva'));
    }

    public function mostrarReservas() {
        $dados = Reserva::paginate(10);
        $mesas = Mesa::where('status', 'Disponivel')->get();
        return view('admin.garcom.reservas', compact('dados', 'mesas'));
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
        ], [
            'id_cliente.integer' => 'O campo id_cliente deve ser um número inteiro.',
            'id_mesa.required' => 'O campo id_mesa é obrigatório.',
            'id_mesa.integer' => 'O campo id_mesa deve ser um número inteiro.',
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser um texto.',
            'email.required' => 'O campo email é obrigatório.',
            'email.string' => 'O campo email deve ser um texto.',
            'email.email' => 'O campo email deve ser um email válido.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.string' => 'O campo telefone deve ser um texto.',
            'date.required' => 'O campo data é obrigatório.',
            'date.date' => 'O campo data deve ser uma data válida.',
            'time.required' => 'O campo hora é obrigatório.',
            'time.string' => 'O campo hora deve ser um texto.',
            'message.string' => 'O campo mensagem deve ser um texto.',
        ]);

        $reserva = new Reserva();
        $reserva->idCliente = $request->id_cliente;
        $reserva->idMesa = $request->id_mesa;
        $reserva->nome = $request->nome;
        $reserva->email = $request->email;
        $reserva->telefone = $request->telefone;
        $reserva->data = $request->date;
        $reserva->hora = $request->time;
        $reserva->observacao = $request->message;
        $reserva->save();

        $mesa = Mesa::where('idMesa', $request->id_mesa)->first();
        $mesa->status = 'Indisponivel';
        $mesa->save();

        return redirect()->route('garcom.reservas')->with('success', 'Reserva feita com sucesso!');
    }

    public function cancelarReserva($id) {
        $reserva = Reserva::where('idReserva', $id)->first();
        $reserva->delete();

        $mesa = Mesa::where('idMesa', $reserva->idMesa)->first();
        $mesa->status = 'Disponivel';
        $mesa->save();

        return redirect()->route('garcom.reservas')->with('success', 'Reserva excluída com sucesso!');
    }
}
