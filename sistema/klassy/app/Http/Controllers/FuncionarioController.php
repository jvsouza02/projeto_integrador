<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function cadastrarFuncionario(Request $request) {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'senha' => 'required|string',
            'cargo' => 'required|numeric',
            'salario' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $caminho_imagem = $request->file('foto')->store('imagens', 'public');

        $usuario = User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => $request->senha,
            'tipo_usuario' => $request->cargo,
        ]);

        $funcionario = Funcionario::create([
            'usuario_id' => $usuario->id,
            'cargo' => $request->cargo,
            'salario' => $request->salario,
            'foto' => $caminho_imagem
        ]);

        return redirect()->route('admin.funcionarios');
    }

    public function editarFuncionario($id) {
        $funcionario = Funcionario::find($id);
        return view('admin.editar_funcionario', compact('funcionario'));
    }

    public function atualizarFuncionario(Request $request, $id) {
        $request->validate([
            'cargo' => 'required|string',
            'salario' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $funcionario = Funcionario::find($id);
        $caminho_imagem = $request->file('foto')->store('imagens', 'public');
        $funcionario->update([
            'cargo' => $request->cargo,
            'salario' => $request->salario,
            'foto' => $caminho_imagem
        ]);

        return redirect()->route('admin.funcionarios');
    }

    public function deletarFuncionario($id) {
        Funcionario::find($id)->delete();
        return redirect()->route('admin.funcionarios');
    }
}
