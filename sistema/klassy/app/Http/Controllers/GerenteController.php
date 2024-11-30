<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prato;

class GerenteController extends Controller
{
    public function mostrarUsuarios() {
        $dados = User::all();
        return view('admin.usuarios', compact('dados'));
    }

    public function deletarUsuario($id) {
        User::find($id)->delete();
        return redirect()->route('admin.usuarios');
    }

    public function mostrarCardapio() {
        $dados = Prato::paginate(3);
        return view('admin.admin_cardapio', compact('dados'));
    }
}
