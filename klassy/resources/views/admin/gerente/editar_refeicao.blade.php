@extends('admin.admin_principal')

@section('content')
    <div class="d-flex flex-column">
        <div>
            @if (@session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form class="form-edited" action="{{ route('atualizar_refeicao', $refeicao->idRefeicao) }}" method="POST"
            enctype="multipart/form-data">
            <h1 class="text-2xl text-bold text-center">Editar Refeicao</h1>
            @csrf
            <div class="mb-3 mt-3">
                <label for="nome">Nome do Refeicao:</label>
                <input type="text" id="nome" name="nome" value="{{ $refeicao->nome }}" required>
            </div>
            <div class="mb-3">
                <label for="descricao">Descricao:</label>
                <input type="text" id="descricao" name="descricao" value="{{ $refeicao->descricao }}">
            </div>
            <div class="mb-3">
                <label for="categoria">Categoria:</label>
                <select name="categoria" id="categoria">
                    <option value="Prato" {{ $refeicao->categoria === 'Prato' ? 'selected' : '' }}>Prato</option>
                    <option value="Bebida" {{ $refeicao->categoria === 'Bebida' ? 'selected' : '' }}>Bebida</option>
                    <option value="Lanche" {{ $refeicao->categoria === 'Lanche' ? 'selected' : '' }}>Lanche</option>
                    <option value="Sobremesa" {{ $refeicao->categoria === 'Sobremesa' ? 'selected' : '' }}>Sobremesa
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="preco">Preco:</label>
                <input type="number" step="0.01" id="preco" name="preco" value="{{ $refeicao->preco }}" required>
            </div>
            <div class="div-disponivel">
                <label for="disponivel">Disponível:</label>
                <div>
                    <input type="radio" name="disponivel" id="disponivel1" value="1">
                    <label for="disponivel1">Sim</label>
                </div>
                <div>
                    <input type="radio" name="disponivel" id="disponivel2" value="0">
                    <label for="disponivel2">Não</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="imagem">Imagem:</label>
                <div style="display: flex; flex-direction: row;">
                    <input type="file" id="imagem" name="imagem" style="color: white !important;">
                    <img id="preview-imagem" src="" alt="Pré-visualização da imagem" width="100" height="100"
                        style="display: none;">
                </div>
            </div>
            <div class="align-self-end"><button type="submit" class="btn btn-success btn-lg">Atualizar Refeição</button>
            </div>
        </form>
    </div>
@endsection
