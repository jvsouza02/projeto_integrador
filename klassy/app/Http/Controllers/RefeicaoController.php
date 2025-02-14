<?php

namespace App\Http\Controllers;

use App\Models\Refeicao;
use Illuminate\Http\Request;

class RefeicaoController extends Controller
{
    public function adicionarRefeicao(Request $request)
    {
        $request->preco = str_replace(',', '.', str_replace('.', '', $request->preco));
        $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'categoria' => 'required|string',
            'preco' => 'required|string',
            'disponivel' => 'required|boolean',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser um texto válida.',
            'descricao.required' => 'A descrição é obrigatória.',
            'descricao.string' => 'A descrição deve ser um texto válida.',
            'categoria.required' => 'A categoria é obrigatória.',
            'categoria.string' => 'A categoria deve ser um texto válida.',
            'preco.required' => 'O preço é obrigatório.',
            'preco.string' => 'O preço deve ser um texto válida.',
            'disponivel.required' => 'A disponibilidade é obrigatória.',
            'disponivel.boolean' => 'A disponibilidade deve ser verdadeiro ou falso.',
            'imagem.required' => 'A imagem é obrigatória.',
            'imagem.image' => 'O arquivo enviado deve ser uma imagem.',
            'imagem.mimes' => 'A imagem deve ser um arquivo do tipo: jpeg, png, jpg, gif, svg.',
            'imagem.max' => 'A imagem não pode exceder 2MB.',
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

        return redirect()->route('gerente.cardapio')->with('success', 'Refeicao cadastrada com sucesso!');
    }
    public function editarRefeicao($id)
    {
        $refeicao = Refeicao::where('idRefeicao', $id)->first();
        return view('admin.gerente.editar_refeicao', compact('refeicao'));
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
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser um texto válida.',
            'descricao.required' => 'A descrição é obrigatória.',
            'descricao.string' => 'A descrição deve ser um texto válida.',
            'categoria.required' => 'A categoria é obrigatória.',
            'categoria.string' => 'A categoria deve ser um texto válida.',
            'preco.required' => 'O preço é obrigatório.',
            'preco.numeric' => 'O preço deve ser um número válido.',
            'disponivel.required' => 'A disponibilidade é obrigatória.',
            'disponivel.boolean' => 'A disponibilidade deve ser verdadeiro ou falso.',
            'imagem.image' => 'O arquivo enviado deve ser uma imagem.',
            'imagem.mimes' => 'A imagem deve ser um arquivo do tipo: jpeg, png, jpg, gif, svg.',
            'imagem.max' => 'A imagem não pode exceder 2MB.',
        ]);

        $refeicao = Refeicao::where('idRefeicao', $id)->first();
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

        return redirect()->route('gerente.cardapio')->with('success', 'Refeicao atualizada com sucesso!');
    }

    public function deletarRefeicao($id)
    {
        Refeicao::where('idRefeicao', $id)->delete();
        return redirect()->route('gerente.cardapio')->with('success', 'Refeicao excluída com sucesso!');
    }
}
