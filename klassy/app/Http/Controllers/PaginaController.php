<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Models\Refeicao;
use App\Models\Carrinho;
use Auth;

class PaginaController extends Controller
{
    public function index()
    {
        if (!Auth::id()) {
            $data = Refeicao::all();
            $funcionarios = Funcionario::whereIn("cargo", ["Garçom", "Cozinheiro"])->paginate(3);
            return view('klassy.principal', compact('data', 'funcionarios'));
        } else {
            $usuario = Auth::user()->tipo_usuario;
            if ($usuario == 'Gerente') {
                return redirect('usuarios');
            } else if ($usuario == 'Cliente') {
                $data = Refeicao::all();
                if (Carrinho::count() > 0) {
                    $quantidade_carrinho = Carrinho::where('id_usuario', Auth::id())->count();
                } else {
                    $quantidade_carrinho = 0;
                }
                $funcionarios = Funcionario::whereIn("cargo", ["Garçom", "Cozinheiro"])->paginate(3);
                return view('klassy.principal', compact('data', 'funcionarios', 'quantidade_carrinho'));
            } else if ($usuario == 'Garçom') {
                return redirect()->route('garcom.pedidos');
            } else if ($usuario == 'Cozinheiro') {
                return redirect()->route('cozinheiro.pedidos');
            }
        }

    }

}
