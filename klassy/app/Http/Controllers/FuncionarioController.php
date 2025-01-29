<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function cadastrarFuncionario(Request $request) {
        $request->salario = str_replace(',', '.', str_replace('.', '', $request->salario));
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:users',
            'senha' => 'required|string|min:8',
            'cargo' => 'required|string',
            'salario' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        return redirect()->route('gerente.funcionarios');
    }

    public function editarFuncionario($id) {
        $funcionario = Funcionario::find($id);
        return view('gerente.editar_funcionario', compact('funcionario'));
    }

    public function atualizarFuncionario(Request $request, $id) {
        $request->validate([
            'cargo' => 'required|string',
            'salario' => 'required|numeric',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $funcionario = Funcionario::find($id);
        if(isset($request->foto)) {
            $caminho_imagem = $request->file('foto')->store('imagens', 'public');
        } else {
            $caminho_imagem = $funcionario->foto;
        }
        $funcionario->update([
            'cargo' => $request->cargo,
            'salario' => $request->salario,
            'foto' => $caminho_imagem
        ]);

        return redirect()->route('gerente.funcionarios');
    }

    public function deletarFuncionario($id) {
        User::find($id)->delete();
        return redirect()->route('gerente.funcionarios');
    }
}
