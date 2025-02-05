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
        ]);

        $mesa = new Mesa();
        $mesa->numero = $request->numeroMesa;
        $mesa->capacidade = $request->capacidade;
        $mesa->status = $request->disponibilidade;
        $mesa->save();

        return redirect()->route('gerente.mesas');
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

        return redirect()->route('gerente.mesas');
    }

    public function deletarMesa(Request $request)
    {
        $mesa = Mesa::find($request->id);
        $mesa->delete();

        return redirect()->route('gerente.mesas');
    }
}
