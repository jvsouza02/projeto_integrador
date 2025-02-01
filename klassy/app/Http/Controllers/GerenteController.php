<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\PedidoItens;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Refeicao;
use App\Models\Funcionario;
use App\Models\Pedido;
use App\Models\Reserva;

class GerenteController extends Controller
{
    public function mostrarUsuarios() {
        $dados = User::all();
        return view('gerente.usuarios', compact('dados'));
    }

    public function deletarUsuario($id) {
        User::find($id)->delete();
        return redirect()->route('gerente.usuarios');
    }

    public function mostrarCardapio() {
        $dados = Refeicao::paginate(3);
        return view('gerente.cardapio', compact('dados'));
    }

    public function mostrarFuncionarios() {
        $dados = Funcionario::paginate(3);
        return view('gerente.funcionarios', compact('dados'));
    }

    public function mostrarPedidos() {
        $dados = PedidoItens::paginate(10);
        return view('gerente.pedidos', compact('dados'));
    }

    public function mostrarReservas() {
        $dados = Reserva::paginate(10);
        return view('gerente.reservas', compact('dados'));
    }

    public function mostrarContatos() {
        $dados = Contato::paginate(10);
        return view('gerente.contatos', compact('dados'));
    }

    public function deletarContato($id) {
        Contato::find($id)->delete();
        return redirect()->route('gerente.contatos');
    }
}
