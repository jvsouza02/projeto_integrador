@extends('admin.admin_principal')

@section('content')
    <div class="container w-50 rounded-md bg-info">
        <h1 class="text-2xl text-bold text-center">Adicionar Prato</h1>
        <form class="mt-4 w-1/4 p-2 text-white" action="{{ route('adicionar_prato') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Prato:</label>
                <input type="text" class="form-control text-black" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descricao:</label>
                <input type="text" class="form-control text-black" id="descricao" name="descricao">
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preco:</label>
                <input type="number" step="0.01" class="form-control text-black" id="preco" name="preco" required>
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem:</label>
                <input type="file" class="form-control text-black" id="imagem" name="imagem" required>
            </div>
            <button type="submit" class="btn btn-primary right-0">Adicionar Prato</button>
        </form>
    </div>
    <div class="container mt-5 flex flex-col align-items-center">
        <h1 class="text-2xl text-center">Pratos</h1>
        <table class="table w-75 table-striped table-hover table-dark rounded-lg">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th>Preco</th>
                    <th>Imagem</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $prato)
                    <tr>
                        <td>{{ $prato->nome }}</td>
                        <td>{{ $prato->descricao }}</td>
                        <td>{{ $prato->preco }}</td>
                        <td><img src="{{ asset('storage/' . $prato->imagem) }}" class="w-25 h-25"></td>
                        <td><a class="btn btn-primary" href="{{ route('editar_prato', $prato->id) }}">Editar</a></td>
                        <td><a class="btn btn-danger" href="{{ route('deletar_prato', $prato->id) }}">Deletar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4 flex flex-col justify-center">
            {{ $dados->links() }}
        </div>
    </div>
@endsection
