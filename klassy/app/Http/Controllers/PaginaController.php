<?php

namespace App\Http\Controllers;

use App\Models\CarrinhoItens;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Mesa;
use Illuminate\Http\Request;
use App\Models\Refeicao;
use App\Models\Carrinho;
use App\Models\User;
use Auth;

class PaginaController extends Controller
{

    public function index()
    {
        if (!Auth::id()) {
            $data = Refeicao::all();
            $mesas = Mesa::where('status', 'Disponível')->get();
            return view('klassy.principal', compact('data', 'mesas'));
        } else {
            $usuario = Auth::user()->tipo_usuario;
            if ($usuario == 'Gerente') {
                if (!Funcionario::where('usuario_id', Auth::user()->id)->exists()) {
                    $funcionario = new Funcionario();
                    $funcionario->usuario_id = Auth::user()->id;
                    $funcionario->cargo = 'Gerente';
                    $funcionario->save();
                }
                return redirect()->route('gerente.usuarios');
            } else if ($usuario == 'Cliente') {
                    if (!Cliente::where('usuario_id', Auth::user()->id)->exists() && !Funcionario::where('usuario_id', Auth::user()->id)->exists()) {
                        if (User::where('tipo_usuario', 'Gerente')->exists()) {
                            $cliente = new Cliente();
                            $cliente->usuario_id = Auth::user()->id;
                            $cliente->save();
                        } else {
                            $funcionario = new Funcionario();
                            $funcionario->usuario_id = Auth::user()->id;
                            $funcionario->cargo = 'Gerente';
                            Auth::user()->tipo_usuario = 'Gerente';
                            $funcionario->save();
                            Auth::user()->save();
                        }
                    }

                $data = Refeicao::all();
                $mesas = Mesa::where('status', 'Disponível')->get();
                if (Carrinho::exists()) {
                    $carrinho = Carrinho::where('id_cliente', Auth::user()->id)->get();
                    $carrinho_itens = CarrinhoItens::where('id_carrinho', $carrinho->id)->count();
                } else {
                    $carrinho_itens = 0;
                }
                return view('klassy.principal', compact('data', 'carrinho_itens', 'mesas'));
            } else if ($usuario == 'Garçom') {
                return redirect()->route('garcom.pedidos');
            } else if ($usuario == 'Cozinheiro') {
                return redirect()->route('cozinheiro.pedidos');
            }
        }

    }
}
