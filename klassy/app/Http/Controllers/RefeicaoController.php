<?php

namespace App\Http\Controllers;

use App\Models\Refeicao;
use Illuminate\Http\Request;

class RefeicaoController extends Controller
{
    public function adicionarRefeicao(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'categoria'=> 'required|string',
            'preco' => 'required|numeric',
            'disponivel'=> 'required|boolean',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $refeicao = new Refeicao();
        $caminho_imagem = $request->file('imagem')->store('imagens', 'public');
        $refeicao->create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'categoria' => $request->categoria,
            'preco' => $request->preco,
            'disponivel' => $request->disponivel,
            'imagem' => $caminho_imagem
        ]);

        return redirect()->route('gerente.cardapio');
    }
    public function editarRefeicao($id)
    {
        $refeicao = Refeicao::find($id);
        return view('gerente.editar_refeicao', compact('refeicao'));
    }

    public function atualizarRefeicao(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'categoria'=> 'required|string',
            'preco' => 'required|numeric',
            'disponivel'=> 'required|boolean',
            'imagem' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $refeicao = Refeicao::find($id);
        if(isset($request->imagem)){
            $caminho_imagem = $request->file('imagem')->store('imagens', 'public');
        }else {
            $caminho_imagem = $refeicao->imagem;
        }
        $refeicao->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'categoria' => $request->categoria,
            'preco' => $request->preco,
            'disponivel'=> $request->disponivel,
            'imagem' => $caminho_imagem
        ]);

        return redirect()->route('gerente.cardapio');
    }

    public function deletarRefeicao($id)
    {
        Refeicao::find($id)->delete();
        return redirect()->route('gerente.cardapio');
    }
}
