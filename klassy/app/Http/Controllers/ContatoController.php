<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function enviarMensagem(Request $request) {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|string|email',
            'assunto' => 'required|string',
            'mensagem' => 'required|string',
        ]);

        $contato = new Contato();
        $contato->nome = $request->nome;
        $contato->email = $request->email;
        $contato->assunto = $request->assunto;
        $contato->mensagem = $request->mensagem;
        $contato->save();

        return redirect()->route('home')->with('success', 'Mensagem enviada com sucesso!');
    }
}
