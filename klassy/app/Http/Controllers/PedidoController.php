<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function finalizarPedido(Request $request) {
        foreach($request->nome as $chave => $nome) {
            $pedido = new Pedido();

            $pedido->id_cliente = auth()->user()->id;
            $pedido->refeicao = $nome;
            $pedido->preco = $request->preco[$chave];
            $pedido->quantidade = $request->quantidade[$chave];
            $pedido->status = 'Em espera';
            $pedido->save();

        }

        Carrinho::where('id_cliente', auth()->user()->id)->delete();
        return redirect()->back();
    }

    public function mostrarPedidos() {
        $pedidos = Pedido::where('id_cliente', auth()->user()->id)->get();
        $quantidade_carrinho = Pedido::where('id_cliente', auth()->user()->id)->count();
        return view('klassy.pedidos', compact('pedidos', 'quantidade_carrinho'));
    }

    public function cancelarPedido($id) {
        Pedido::find($id)->delete();
        return redirect()->back();
    }

    public function alterarStatus(Request $request) {
        $pedido = Pedido::find($request->id_pedido);
        $pedido->status = $request->status;
        $pedido->save();
        return redirect()->route('cozinheiro.pedidos');
    }
}
