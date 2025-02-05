<?php

namespace App\Http\Controllers;

use App\Models\CarrinhoItens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrinho;

class CarrinhoController extends Controller
{
    public function adicionarCarrinho($id)
    {
        if (!Carrinho::where('id_cliente', Auth::user()->id)->exists()) {
            $carrinho = new Carrinho();
            $carrinho->id_cliente = Auth::user()->id;
            $carrinho->save();
        }

        $carrinho = Carrinho::where('id_cliente', Auth::user()->id)->get();
        $carrinho_itens = new CarrinhoItens();
        $carrinho_itens->id_carrinho = $carrinho->id;
        $carrinho_itens->id_refeicao = $id;
        $carrinho_itens->quantidade = 1;
        $carrinho_itens->save();


        return redirect()->back();
    }

    public function mostrarCarrinho($id)
    {
        $carrinho = Carrinho::where('id_cliente', $id)->get();
        $carrinho_itens = CarrinhoItens::where('id_carrinho', $carrinho->id)->get();
        return view('klassy.carrinho', compact('carrinho', 'carrinho_itens'));
    }

    public function removerCarrinho($id)
    {
        $carrinho = Carrinho::where('id_cliente', Auth::user()->id)->get();
        CarrinhoItens::where('id_carrinho', $carrinho->id)->where('id_refeicao', $id)->delete();
        return redirect()->back();
    }
}
