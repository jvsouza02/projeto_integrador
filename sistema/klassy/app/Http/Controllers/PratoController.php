<?php

namespace App\Http\Controllers;

use App\Models\Prato;
use Illuminate\Http\Request;

class PratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function adicionarPrato(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $prato = new Prato();
        $caminho_imagem = $request->file('imagem')->store('imagens', 'public');
        $prato->create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'imagem' => $caminho_imagem
        ]);

        return redirect()->route('admin.cardapio');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prato $prato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editarPrato($id)
    {
        $prato = Prato::find($id);
        return view('admin.editar_prato', compact('prato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function atualizarPrato(Request $request, Prato $prato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletarPrato(Prato $prato)
    {

    }
}
