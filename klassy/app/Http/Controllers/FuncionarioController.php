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
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser um texto.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'email.unique' => 'O email informado já está em uso.',
            'senha.required' => 'O campo senha é obrigatório.',
            'senha.string' => 'O campo senha deve ser um texto.',
            'senha.min' => 'O campo senha deve ter no mínimo 8 caracteres.',
            'cargo.required' => 'O campo cargo é obrigatório.',
            'cargo.string' => 'O campo cargo deve ser um texto.',
            'salario.required' => 'O campo salário é obrigatório.',
            'salario.string' => 'O campo salário deve ser um texto.',
            'foto.image' => 'O campo foto deve ser uma imagem.',
            'foto.mimes' => 'O campo foto deve ser um arquivo do tipo: jpeg, png, jpg, gif, svg.',
            'foto.max' => 'O campo foto não pode ser maior que 2048 kilobytes.',
        ]);

        $caminho_imagem = $request->file('foto')->store('imagens', 'public');

        $usuario = User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => $request->senha,
            'tipo_usuario' => $request->cargo,
        ]);

        Funcionario::create([
            'idUsuario' => $usuario->id,
            'cargo' => $request->cargo,
            'salario' => $request->salario,
            'foto' => $caminho_imagem
        ]);

        return redirect()->route('gerente.funcionarios')->with('success', 'Funcionario cadastrado com sucesso!');
    }

    public function editarFuncionario($id) {
        $funcionario = Funcionario::where('idFuncionario', $id)->first();
        return view('admin.gerente.editar_funcionario', compact('funcionario'));
    }

    public function atualizarFuncionario(Request $request, $id) {
        $request->salario = str_replace(',', '.', str_replace('.', '', $request->salario));
        $request->validate([
            'cargo' => 'required|string',
            'salario' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'cargo.required' => 'O campo cargo é obrigatório.',
            'cargo.string' => 'O campo cargo deve ser um texto.',
            'salario.required' => 'O campo salário é obrigatório.',
            'salario.string' => 'O campo salário deve ser um texto.',
            'foto.image' => 'O campo foto deve ser uma imagem.',
            'foto.mimes' => 'O campo foto deve ser um arquivo do tipo: jpeg, png, jpg, gif, svg.',
            'foto.max' => 'O campo foto não pode ser maior que 2048 kilobytes.',
        ]);

        $funcionario = Funcionario::where('idFuncionario', $id)->first();
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

        return redirect()->route('gerente.funcionarios')->with('success', 'Funcionario atualizado com sucesso!');
    }

    public function deletarFuncionario($id) {
        User::where('id', $id)->delete();
        return redirect()->route('gerente.funcionarios')->with('success', 'Funcionario excluido com sucesso!');
    }
}
