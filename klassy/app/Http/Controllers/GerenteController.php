<?php

namespace App\Http\Controllers;

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
        $dados = Refeicao::paginate(4);
        return view('gerente.cardapio', compact('dados'));
    }

    public function mostrarFuncionarios() {
        $dados = Funcionario::paginate(4);
        return view('gerente.funcionarios', compact('dados'));
    }

    public function mostrarPedidos() {
        $dados = Pedido::paginate(10);
        return view('gerente.pedidos', compact('dados'));
    }

    public function mostrarReservas() {
        $dados = Reserva::paginate(10);
        return view('gerente.reservas', compact('dados'));
    }

}
