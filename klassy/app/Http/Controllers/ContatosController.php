<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class ContatosController extends Controller
{
    public function enviarMensagem(Request $request) {
        $request->validate([
            'id_cliente' => 'nullable|integer',
            'nome' => 'required|string',
            'email' => 'required|string|email',
            'assunto' => 'required|string',
            'mensagem' => 'required|string',
        ], [
            'nome.required' => 'O campo nome é obrigatório e deve ser um texto.',
            'email.required' => 'O campo email é obrigatório e deve ser um texto.',
            'email.email' => 'O campo email deve ser um email válido.',
            'assunto.required' => 'O campo assunto é obrigatório e deve ser um texto.',
            'mensagem.required' => 'O campo mensagem é obrigatório e deve ser um texto.',
        ]);

        $contato = new Contato();
        $contato->idCliente = $request->id_cliente;
        $contato->nome = $request->nome;
        $contato->email = $request->email;
        $contato->assunto = $request->assunto;
        $contato->mensagem = $request->mensagem;
        $contato->save();

        return redirect()->back()->with('success', 'Mensagem enviada com sucesso!');
    }

    public function deletarMensagem($id) {
        Contato::where('idContato', $id)->delete();
        return redirect()->back()->with('success', 'Mensagem excluida com sucesso!');
    }
}
