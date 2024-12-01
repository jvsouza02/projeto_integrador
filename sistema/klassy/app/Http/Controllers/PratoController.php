<?php

namespace App\Http\Controllers;

use App\Models\Prato;
use Illuminate\Http\Request;

class PratoController extends Controller
{
    public function adicionarPrato(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $prato = new Prato();
        $caminho_imagem = $request->file('imagem')->store('imagens', 'public');
        $prato->create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'imagem' => $caminho_imagem
        ]);

        return redirect()->route('admin.cardapio');
    }
    public function editarPrato($id)
    {
        $prato = Prato::find($id);
        return view('admin.editar_prato', compact('prato'));
    }

    public function atualizarPrato(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $prato = Prato::find($id);
        $caminho_imagem = $request->file('imagem')->store('imagens', 'public');
        $prato->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'imagem' => $caminho_imagem
        ]);

        return redirect()->route('admin.cardapio');
    }

    public function deletarPrato($id)
    {
        Prato::find($id)->delete();
        return redirect()->route('admin.cardapio');
    }
}
