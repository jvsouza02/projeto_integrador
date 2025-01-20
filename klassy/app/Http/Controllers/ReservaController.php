<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservaController extends Controller
{
    public function fazerReserva(Request $request)
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

        $reserva = new Reserva();
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
}
