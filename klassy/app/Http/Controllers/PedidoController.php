<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\CarrinhoItens;
use App\Models\Pagamento;
use App\Models\Pedido;
use App\Models\PedidoItens;
use Auth;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function finalizarPedido(Request $request)
    {
        // Busca o CARRINHO do cliente
        $carrinho = Carrinho::where('idCliente', Auth::user()->cliente->idCliente)->first();
        // Busca os ITENS do carrinho (não o carrinho em si)
        $itensCarrinho = CarrinhoItens::where('idCarrinho', $carrinho->idCarrinho)->get();

        // Cria e salva o PEDIDO primeiro
        $pedido = new Pedido();
        $pedido->idCliente = Auth::user()->cliente->idCliente;
        $pedido->valorTotal = 0;
        $pedido->status = 'Em espera';
        $pedido->save(); // Salva para gerar o ID

        // Calcula o valorTotal e vincula os itens
        $valorTotal = 0;

        foreach ($itensCarrinho as $item) {
            // Cria uma NOVA instância para cada item
            $pedidoItem = new PedidoItens();
            $pedidoItem->idPedido = $pedido->idPedido;
            $pedidoItem->idRefeicao = $item->idRefeicao;
            $pedidoItem->quantidade = $item->quantidade;
            $pedidoItem->valorUnitario = $item->refeicao->preco;
            $pedidoItem->save();

            // Acumula o valor total
            $valorTotal += $item->quantidade * $item->refeicao->preco;
        }

        // Atualiza o valorTotal do pedido
        $pedido->valorTotal = $valorTotal;
        $pedido->save();

        // Cria o pagamento com o valor correto
        $pagamento = new Pagamento();
        $pagamento->idPedido = $pedido->idPedido;
        $pagamento->valor = $pedido->valorTotal;
        $pagamento->save();

        // Limpa o carrinho (ajuste para a sua estrutura real)
        $carrinho->delete();

        return redirect()->back();
    }

    public function mostrarPedidos()
    {
        // Verifica se o usuário está autenticado e tem um cliente vinculado
        if (!Auth::check() || !Auth::user()->cliente) {
            return redirect()->route('login')->with('error', 'Faça login para ver seus pedidos.');
        }

        // Obtém o ID do cliente autenticado
        $clienteId = Auth::user()->cliente->idCliente;

        // Busca todos os pedidos do cliente com seus itens (usando eager loading)
        $pedidos = Pedido::where('idCliente', $clienteId)
            ->with('pedidoItens.refeicao') // Carrega os itens e as refeições relacionadas
            ->orderBy('created_at', 'desc') // Ordena do mais recente para o mais antigo
            ->get();

        $carrinho = Carrinho::where('idCliente', Auth::user()->cliente->idCliente)->first();
        if ($carrinho) {
            $carrinho_itens_count = CarrinhoItens::where('idCarrinho', $carrinho->idCarrinho)->count();
        } else {
            $carrinho_itens_count = 0;
        }
        return view('klassy.pedidos', compact('pedidos', 'carrinho_itens_count'));
    }

    public function cancelarPedido($id)
    {
        Pedido::find($id)->delete();
        return redirect()->back();
    }

    public function alterarStatus(Request $request)
    {
        $pedido = Pedido::find($request->id_pedido);
        $pedido->status = $request->status;
        $pedido->save();
        return redirect()->route('cozinheiro.pedidos');
    }
}
