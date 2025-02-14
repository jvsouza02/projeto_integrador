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
            $mesas = Mesa::where('status', 'Disponivel')->get();
            $carrinho_itens_count = 0;
            return view('klassy.principal', compact('data', 'mesas', 'carrinho_itens_count'));
        } else {
            $usuario = Auth::user()->tipo_usuario;
            if ($usuario == 'Gerente') {
                if (!Funcionario::where('idUsuario', Auth::user()->id)->exists()) {
                    $funcionario = new Funcionario();
                    $funcionario->idUsuario = Auth::user()->id;
                    $funcionario->cargo = 'Gerente';
                    $funcionario->save();
                }
                return redirect()->route('gerente.relatorios');
            } else if ($usuario == 'Cliente') {
                if (!Cliente::where('idUsuario', Auth::user()->id)->exists() && !Funcionario::where('idUsuario', Auth::user()->id)->exists()) {
                    if (User::where('tipo_usuario', 'Gerente')->exists()) {
                        $cliente = new Cliente();
                        $cliente->idUsuario = Auth::user()->id;
                        $cliente->save();
                    } else {
                        $funcionario = new Funcionario();
                        $funcionario->idUsuario = Auth::user()->id;
                        $funcionario->cargo = 'Gerente';
                        Auth::user()->tipo_usuario = 'Gerente';
                        $funcionario->save();
                        Auth::user()->save();
                        return redirect()->route('gerente.relatorios');
                    }
                }

                $data = Refeicao::all();
                $mesas = Mesa::where('status', 'Disponivel')->get();
                if (Cliente::where('idUsuario', Auth::user()->id)->exists()) {
                    $carrinho = Carrinho::where('idCliente', Auth::user()->cliente->idCliente)->first();
                    if ($carrinho) {
                        $carrinho_itens_count = CarrinhoItens::where('idCarrinho', $carrinho->idCarrinho)->count();
                    } else {
                        $carrinho_itens_count = 0;
                    }
                } else {
                    $carrinho_itens_count = 0;
                }

                return view('klassy.principal', compact('data', 'carrinho_itens_count', 'mesas'));
            } else if ($usuario == 'Garçom') {
                return redirect()->route('garcom.pedidos');
            } else if ($usuario == 'Cozinheiro') {
                return redirect()->route('cozinheiro.pedidos');
            }
        }
    }
    public function filter(Request $request)
    {
        $category = $request->input('category');

        if ($category === 'Todas') {
            $meals = Refeicao::where('disponivel', 1)->get();
        } else {
            $meals = Refeicao::where('categoria', $category)
                ->where('disponivel', 1)
                ->get();
        }

        // Verifique se a partial view existe e se a variável $meals possui dados
        return response()->json(['html' => view('partials.menu_items', compact('meals'))->render()]);
    }

}
