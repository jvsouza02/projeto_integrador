<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrinho;

class CarrinhoController extends Controller
{
    public function adicionarCarrinho($id)
    {
        if (Auth::id()) {
            $carrinho = new Carrinho();
            $carrinho->id_usuario = Auth::user()->id;
            $carrinho->id_refeicao = $id;
            $carrinho->quantidade = 1;
            $carrinho->save();
            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function mostrarCarrinho($id)
    {
        if (Auth::id()) {
            $carrinho = Carrinho::where('id_usuario', $id)->get();
            $quantidade_carrinho = Carrinho::where('id_usuario', Auth::user()->id)->count();
            $itens = Carrinho::where('id_usuario', $id)->join('refeicoes', 'carrinhos.id_refeicao', '=', 'refeicoes.id')->get();
            return view('klassy.carrinho', ['carrinho' => $carrinho, 'quantidade_carrinho' => $quantidade_carrinho, 'itens' => $itens]);
        } else {
            return redirect('/login');
        }
    }

    public function removerCarrinho($id)
    {
        Carrinho::where('id_refeicao', $id)->where('id_usuario', Auth::user()->id)->delete();
        return redirect()->back();
    }
}
