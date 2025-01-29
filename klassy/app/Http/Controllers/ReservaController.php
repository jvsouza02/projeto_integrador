<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use Illuminate\Http\Request;
use App\Models\Reserva;
use Auth;

class ReservaController extends Controller
{
    public function fazerReserva(Request $request)
    {
        $request->validate([
            'id_usuario' => 'nullable|integer',
            'nome' => 'required|string',
            'email' => 'required|string|email',
            'telefone' => 'required|string',
            'numero_pessoas' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required|string',
            'message' => 'nullable|string',
        ]);

        $reserva = new Reserva();
        $reserva->id_usuario = $request->id_usuario;
        $reserva->nome = $request->nome;
        $reserva->email = $request->email;
        $reserva->telefone = $request->telefone;
        $reserva->numero_pessoas = $request->numero_pessoas;
        $reserva->data = $request->date;
        $reserva->hora = $request->time;
        $reserva->observacao = $request->message;
        $reserva->save();

        return redirect()->route('home');
    }

    public function mostrarReservas()
    {
        $reservas = Reserva::where('id_usuario', Auth::user()->id)->get();
        $quantidade_carrinho = Carrinho::where('id_usuario', Auth::user()->id)->count();

        return view('klassy.reservas', compact('reservas', 'quantidade_carrinho'));
    }

    public function atualizarReserva(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|string|email',
            'telefone' => 'required|string',
            'numero_pessoas' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required|string',
            'message' => 'nullable|string',
        ]);

        $reserva = Reserva::find($request->id);
        $reserva->nome = $request->nome;
        $reserva->email = $request->email;
        $reserva->telefone = $request->telefone;
        $reserva->numero_pessoas = $request->numero_pessoas;
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
