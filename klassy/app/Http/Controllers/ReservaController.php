<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\CarrinhoItens;
use App\Models\Mesa;
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
        ], [
            'id_cliente.integer' => 'O campo id do cliente deve ser um número inteiro.',
            'id_mesa.required' => 'O campo id da mesa é obrigatório.',
            'id_mesa.integer' => 'O campo id da mesa deve ser um número inteiro.',
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser um texto.',
            'email.required' => 'O campo email é obrigatório.',
            'email.string' => 'O campo email deve ser um texto.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
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

        return redirect()->back()->with('success', 'Reserva feita com sucesso!');
    }

    public function mostrarReservas()
    {
        $reservas = Reserva::where('idCliente', Auth::user()->cliente->idCliente)->paginate(3);

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
        ], [
            'idReserva.required' => 'O campo id da reserva é obrigatório.',
            'idReserva.integer' => 'O campo id da reserva deve ser um número inteiro.',
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser um texto.',
            'email.required' => 'O campo email é obrigatório.',
            'email.string' => 'O campo email deve ser um texto.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.string' => 'O campo telefone deve ser um texto.',
            'date.required' => 'O campo data é obrigatório.',
            'date.date' => 'O campo data deve ser uma data válida.',
            'time.required' => 'O campo hora é obrigatório.',
            'time.string' => 'O campo hora deve ser um texto.',
            'message.string' => 'O campo mensagem deve ser um texto.',
        ]);

        $reserva = Reserva::where('idReserva', $request->idReserva)->first();
        $reserva->nome = $request->nome;
        $reserva->email = $request->email;
        $reserva->telefone = $request->telefone;
        $reserva->data = $request->date;
        $reserva->hora = $request->time;
        $reserva->observacao = $request->message;
        $reserva->save();

        return redirect()->route('cliente.reservas')->with('success', 'Reserva atualizada com sucesso!');
    }

    public function cancelarReserva($id)
    {
        $reserva = Reserva::where('idReserva', $id)->first();
        $reserva->delete();

        $mesa = Mesa::where('idMesa', $reserva->idMesa)->first();
        $mesa->status = 'Disponivel';
        $mesa->save();

        return redirect()->route('cliente.reservas')->with('success', 'Reserva cancelada com sucesso!');
    }
}
