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
        if (!Carrinho::where('idCliente', Auth::user()->cliente->idCliente)->exists()) {
            $carrinho = new Carrinho();
            $carrinho->idCliente = Auth::user()->cliente->idCliente;
            $carrinho->save();
        }

        $carrinho = Carrinho::where('idCliente', Auth::user()->cliente->idCliente)->first();

        if (!CarrinhoItens::where('idCarrinho', $carrinho->idCarrinho)->where('idRefeicao', $id)->exists()) {
            $carrinho_itens = new CarrinhoItens();
            $carrinho_itens->idCarrinho = $carrinho->idCarrinho;
            $carrinho_itens->idRefeicao = $id;
            $carrinho_itens->quantidade = 1;
            $carrinho_itens->save();
        } else {
            $carrinho_itens = CarrinhoItens::where('idCarrinho', $carrinho->idCarrinho)->where('idRefeicao', $id)->first();
            $carrinho_itens->quantidade += 1;
            $carrinho_itens->save();
        }

        return redirect()->back();
    }

    public function mostrarCarrinho($id)
    {
        $carrinho = Carrinho::where('idCliente', Auth::user()->cliente->idCliente)->first();
        if ($carrinho) {
            $carrinho_itens_count = CarrinhoItens::where('idCarrinho', $carrinho->idCarrinho)->count();
        } else {
            $carrinho_itens_count = 0;
        }
        return view('klassy.carrinho', compact('carrinho', 'carrinho_itens_count'));
    }

    public function atualizarCarrinho(Request $request)
    {
        try {
            $carrinho = Carrinho::where('idCliente', Auth::user()->cliente->idCliente)->first();
            if (!$carrinho) {
                return response()->json(['error' => 'Carrinho não encontrado.'], 404);
            }

            foreach ($request->quantidade as $itemId => $quantidade) {
                $item = CarrinhoItens::where('idCarrinhoItem', $itemId)->where('idCarrinho', $carrinho->idCarrinho)->first();
                if ($quantidade > 0) {
                    $item->update(['quantidade' => $quantidade]);
                } else {
                    $item->delete();
                }
            }

            $total = $carrinho->carrinhoItens->sum(function ($item) {
                return $item->quantidade * $item->refeicao->preco;
            });

            return response()->json(['total' => $total]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function removerCarrinho($id)
    {
        $carrinho = Carrinho::where('idCliente', Auth::user()->cliente->idCliente)->first();
        CarrinhoItens::where('idCarrinho', $carrinho->idCarrinho)->where('idRefeicao', $id)->delete();
        if (CarrinhoItens::where('idCarrinho', $carrinho->idCarrinho)->count() == 0) {
            $carrinho->delete();
        }
        return redirect()->back();
    }
}
