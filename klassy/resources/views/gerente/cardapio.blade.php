@extends('admin.admin_principal')

@section('content')
    <div class="d-flex flex-column rounded-md">
        <div>
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
        <form class="form-edited" action="{{ route('adicionar_refeicao') }}" method="POST" enctype="multipart/form-data">
            <h1 class="text-2xl text-bold text-center">Adicionar Refeição</h1>
            @csrf
            <div class="mb-3 mt-3">
                <label for="nome">Nome do refeição:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="descricao">Descricao:</label>
                <input type="text" id="descricao" name="descricao">
            </div>
            <div class="mb-3">
                <label for="categoria">Categoria:</label>
                <select name="categoria" id="categoria">
                    <option value="#" selected disabled></option>
                    <option value="prato">Prato</option>
                    <option value="Bebida">Bebida</option>
                    <option value="Lanche">Lanche</option>
                    <option value="Sobremesa">Sobremesa</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="preco">Preço(R$):</label>
                <input type="text" id="preco" name="preco" required>
            </div>
            <div class="mb-3 div-disponivel">
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
                    <input type="file" id="imagem" name="imagem" style="color: white !important;" required>
                    <img id="preview-imagem" src="" alt="Pré-visualização da imagem" width="100" height="100"
                        style="display: none;">
                </div>
            </div>
            <div class="align-self-end"><button type="submit" class="btn btn-success btn-lg">Adicionar Refeição</button>
            </div>
        </form>
    </div>
    <div class="container">
        @if ($dados->count() > 0)
            <div class="card-main">
                <div class="d-flex flex-column">
                    <div class="d-flex align-self-center">
                        <h1 class="text-2xl text-bold text-center">Refeições</h1>
                    </div>
                    <div class="card-container" id="refeicoes-container">
                        @foreach ($dados as $refeicao)
                            <div class="card-hover card-refeicoes">
                                <img src="{{ asset('storage/' . $refeicao->imagem) }}" class="card-img-top"
                                    style="height: 200px; object-fit: cover;"
                                    alt="Imagem do refeicao {{ $refeicao->nome }}">
                                <div class="card-body-container">
                                    <h5 class="card-title text-xl">{{ $refeicao->nome }}</h5>
                                    <p class="card-text"><strong>Descrição:</strong> {{ $refeicao->descricao }}</p>
                                    <p class="card-text"><strong>Categoria:</strong> {{ $refeicao->categoria }}</p>
                                    <p class="card-text"><strong>Preço:</strong> R$ {{ $refeicao->preco }}</p>
                                    <p class="card-text"><strong>Disponibilidade:</strong>
                                        {{ $refeicao->disponivel ? 'Sim' : 'Não' }}</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('editar_refeicao', $refeicao->idRefeicao) }}"
                                        class="btn btn-primary">Editar</a>
                                    <a href="{{ route('deletar_refeicao', $refeicao->idRefeicao) }}"
                                        class="btn btn-danger">Deletar</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    {{ $dados->links('pagination::custom-admin') }}
                </div>
            </div>
        @endif
    </div>
@endsection
