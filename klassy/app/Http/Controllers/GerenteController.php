<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Mesa;
use App\Models\Pagamento;
use App\Models\PedidoItens;
use DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Refeicao;
use App\Models\Funcionario;
use App\Models\Pedido;
use App\Models\Reserva;

class GerenteController extends Controller
{
    public function mostrarRelatorios()
    {
        $anoAtual = date('Y');
        /* =-=-=-= Receita por mês =-=-=-= */
        $receita = Pagamento::selectRaw('
            EXTRACT(MONTH FROM created_at) as mes,
            EXTRACT(YEAR FROM created_at) as ano,
            SUM(valor) as total
        ')
            ->whereRaw('EXTRACT(YEAR FROM created_at) = ?', [$anoAtual])
            ->groupBy('mes', 'ano')
            ->orderBy('mes')
            ->get()
            ->keyBy('mes');

        $dados = collect(range(1, 12))->mapWithKeys(function ($mes) use ($receita, $anoAtual) {
            $valor = $receita->has($mes) ? $receita[$mes]->total : 0;
            return [
                $mes => [
                    'mes' => $mes,
                    'ano' => $anoAtual,
                    'total' => $valor
                ]
            ];
        });

        $receita_meses = $dados->values()->toArray();

        /* =-=-=-= Quantidade de usuários =-=-=-= */

        $dados = User::select('tipo_usuario', DB::raw('COUNT(*) as total'))
            ->groupBy('tipo_usuario')
            ->get();

        // Extraindo os labels (tipos) e os valores (quantidade)

        $tipos_usuarios = $dados->pluck('tipo_usuario');
        $contagens_usuarios = $dados->pluck('total');

        /* =-=-=-= Quantidade de pedidos por categoria =-=-=-= */

        $dados = DB::table('pedido_itens')
            ->join('refeicoes', 'pedido_itens.idRefeicao', '=', 'refeicoes.idRefeicao')
            ->select('refeicoes.categoria as categoria', DB::raw('COUNT(*) as total'))
            ->groupBy('refeicoes.categoria')
            ->get();

        $categoriasFixas = ['Prato', 'Bebida', 'Lanche', 'Sobremesa'];
        $categorias_pedidos = [];
        $totais_pedidos = [];

        foreach ($categoriasFixas as $categoria) {
            $registro = $dados->firstWhere('categoria', $categoria);
            $categorias_pedidos[] = $categoria;
            $totais_pedidos[] = $registro ? (int) $registro->total : 0;
        }

        /* =-=-=-= Quantidade de pedidos por mês =-=-=-= */

        $pedidos = Pedido::selectRaw('EXTRACT(MONTH FROM created_at) as mes, COUNT(*) as total')
            ->whereRaw('EXTRACT(YEAR FROM created_at) = ?', [$anoAtual])
            ->groupByRaw('EXTRACT(MONTH FROM created_at)')
            ->orderByRaw('EXTRACT(MONTH FROM created_at)')
            ->get()
            ->keyBy('mes');

        $pedidos_meses = collect(range(1, 12))->mapWithKeys(function ($mes) use ($pedidos) {
            return [$mes => $pedidos->has($mes) ? $pedidos[$mes]->total : 0];
        });

        $pedidos_meses = $pedidos_meses->toArray();

        /* =-=-=-= Quantidade de pedidos por hora =-=-=-= */

        $pedidos = Pedido::selectRaw('EXTRACT(HOUR FROM created_at) as hora, COUNT(*) as total')
            ->groupByRaw('EXTRACT(HOUR FROM created_at)')
            ->orderByRaw('EXTRACT(HOUR FROM created_at)')
            ->get()
            ->keyBy('hora');

        $pedidos_horas = collect(range(0, 23))->mapWithKeys(function ($hora) use ($pedidos) {
            return [$hora => $pedidos->has($hora) ? $pedidos[$hora]->total : 0];
        });

        $pedidos_horas = $pedidos_horas->toArray();

        return view('admin.gerente.dashboard', compact('receita_meses', 'tipos_usuarios', 'contagens_usuarios', 'categorias_pedidos', 'totais_pedidos', 'pedidos_meses', 'pedidos_horas'));
    }
    public function mostrarUsuarios()
    {
        $dados = User::paginate(5);
        return view('admin.gerente.usuarios', compact('dados'));
    }

    public function deletarUsuario($id)
    {
        User::find($id)->delete();
        return redirect()->route('gerente.usuarios')->with('success', 'Usuário excluído com sucesso!');
    }

    public function mostrarCardapio()
    {
        $dados = Refeicao::paginate(3);
        return view('admin.gerente.cardapio', compact('dados'));
    }

    public function mostrarFuncionarios()
    {
        $dados = Funcionario::paginate(4);
        return view('admin.gerente.funcionarios', compact('dados'));
    }

    public function mostrarMesas()
    {
        $dados = Mesa::paginate(5);
        return view('admin.gerente.mesas', compact('dados'));
    }

    public function mostrarContatos()
    {
        $dados = Contato::paginate(5);
        return view('admin.gerente.contatos', compact('dados'));
    }

}
