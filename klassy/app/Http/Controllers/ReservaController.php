<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\CarrinhoItens;
use Illuminate\Http\Request;
use App\Models\Reserva;
use Auth;

class ReservaController extends Controller
{
    public function fazerReserva(Request $request)
    {
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
        $reserva->idCliente = $request->id_cliente;
        $reserva->idMesa = $request->id_mesa;
        $reserva->nome = $request->nome;
        $reserva->email = $request->email;
        $reserva->telefone = $request->telefone;
        $reserva->data = $request->date;
        $reserva->hora = $request->time;
        $reserva->observacao = $request->message;
        $reserva->save();

        return redirect()->route('home');
    }

    public function mostrarReservas()
    {
        $reservas = Reserva::where('idCliente', Auth::user()->cliente->idCliente)->get();

        $carrinho = Carrinho::where('idCliente', Auth::user()->cliente->idCliente)->first();
        if ($carrinho) {
            $carrinho_itens_count = CarrinhoItens::where('idCarrinho', $carrinho->idCarrinho)->count();
        } else {
            $carrinho_itens_count = 0;
        }

        return view('klassy.reservas', compact('reservas', 'carrinho_itens_count'));
    }

    public function atualizarReserva(Request $request)
    {
        $request->validate([
            'idReserva' => 'required|integer',
            'nome' => 'required|string',
            'email' => 'required|string|email',
            'telefone' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'message' => 'nullable|string',
        ]);

        $reserva = Reserva::where('idReserva', $request->idReserva)->first();
        $reserva->nome = $request->nome;
        $reserva->email = $request->email;
        $reserva->telefone = $request->telefone;
        $reserva->data = $request->date;
        $reserva->hora = $request->time;
        $reserva->observacao = $request->message;
        $reserva->save();

        return redirect()->route('cliente.reservas');
    }

    public function cancelarReserva($id)
    {
        $reserva = Reserva::find($id);
        $reserva->delete();

        return redirect()->route('cliente.reservas');
    }
}
