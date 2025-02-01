<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Pagamento;
use App\Models\Pedido;
use App\Models\PedidoItens;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function finalizarPedido(Request $request) {
        $carrinho = Carrinho::where('id_cliente', auth()->user()->id)->get();
        $pedido = new Pedido();
        $pedido->id_cliente = auth()->user()->id;
        $pedido->status = 'Em espera';

        $pedido_itens = new PedidoItens();
        foreach ($carrinho as $item) {
            $pedido_itens->id_pedido = $pedido->id;
            $pedido_itens->id_refeicao = $item->id_refeicao;
            $pedido_itens->quantidade = $item->quantidade;
            $pedido_itens->valor_unitario = $item->refeicao->preco;
            $pedido_itens->save();
        }

        foreach ($pedido_itens as $item) {
            $pedido->valor_total += $item->quantidade * $item->valor_unitario;
        }

        $pedido->save();

        $pagamento = new Pagamento();
        $pagamento->id_pedido = $pedido->id;
        $pagamento->valor = $pedido->valor_total;
        $pagamento->save();

        Carrinho::where('id_cliente', auth()->user()->id)->delete();
        return redirect()->back();
    }

    public function mostrarPedidos() {
        $pedidos = Pedido::where('id_cliente', auth()->user()->id)->get();
        $pedido_itens = PedidoItens::where('id_pedido', $pedidos->id)->get();
        $carrinho_itens = Carrinho::where('id_cliente', auth()->user()->id)->get();
        return view('klassy.pedidos', compact('carrinho_itens', 'pedido_itens'));
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
