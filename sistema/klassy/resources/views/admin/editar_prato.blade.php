@extends('admin.admin_principal')

@section('content')
    <div class="container w-50 rounded-md bg-info">
        <h1 class="text-2xl text-bold text-center">Editar Prato</h1>
        <form class="mt-4 w-1/4 p-2 text-white" action="{{ route('atualizar_prato', $prato->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Prato:</label>
                <input type="text" class="form-control text-black" id="nome" name="nome" value="{{ $prato->nome }}" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descricao:</label>
                <input type="text" class="form-control text-black" id="descricao" name="descricao" value="{{ $prato->descricao }}">
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preco:</label>
                <input type="number" step="0.01" class="form-control text-black" id="preco" name="preco" value="{{ $prato->preco }}" required>
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem:</label>
                <input type="file" class="form-control text-black" id="imagem" name="imagem" file="{{ $prato->imagem }}" required>
            </div>
            <button type="submit" class="btn btn-primary right-0">Atualizar Prato</button>
        </form>
    </div>
@endsection
