<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    public function cadastrarMesa(Request $request)
    {
        $request->validate([
            'numeroMesa' => 'required|string',
            'capacidade' => 'required|integer',
            'disponibilidade' => 'nullable|string',
        ], [
            'numeroMesa.required' => 'O campo número da mesa é obrigatório.',
            'numeroMesa.string' => 'O campo número da mesa deve ser um texto.',
            'capacidade.required' => 'O campo capacidade é obrigatório.',
            'capacidade.integer' => 'O campo capacidade deve ser um número inteiro.',
            'disponibilidade.string' => 'O campo disponibilidade deve ser uma texto.',
        ]);

        $mesa = new Mesa();
        $mesa->numero = $request->numeroMesa;
        $mesa->capacidade = $request->capacidade;
        $mesa->status = $request->disponibilidade;
        $mesa->save();

        return redirect()->route('gerente.mesas')->with('success', 'Mesa cadastrada com sucesso!');
    }

    public function editarMesa(Request $request)
    {
        $request->validate([
            'numeroMesa' => 'required|string',
            'capacidade' => 'required|integer',
            'disponibilidade' => 'nullable|string',
        ]);

        $mesa = Mesa::find($request->id);
        $mesa->numero = $request->numeroMesa;
        $mesa->capacidade = $request->capacidade;
        $mesa->status = $request->disponibilidade;
        $mesa->save();

        return redirect()->route('gerente.mesas')->with('success', 'Mesa atualizada com sucesso!');
    }

    public function deletarMesa(Request $request)
    {
        $mesa = Mesa::find($request->id);
        $mesa->delete();
        return redirect()->route('gerente.mesas')->with('success', 'Mesa excluida com sucesso!');
    }
}
