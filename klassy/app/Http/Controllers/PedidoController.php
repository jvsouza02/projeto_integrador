<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function finalizarPedido(Request $request) {
        foreach($request->nome as $chave => $nome) {
            $pedido = new Pedido();

            $pedido->id_usuario = auth()->user()->id;
            $pedido->refeicao = $nome;
            $pedido->preco = $request->preco[$chave];
            $pedido->quantidade = $request->quantidade[$chave];
            $pedido->status = 'Em espera';
            $pedido->save();

        }

        return redirect()->back();
    }
}
