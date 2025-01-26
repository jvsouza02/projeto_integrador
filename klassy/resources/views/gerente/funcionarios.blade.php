@extends('admin.admin_principal')

@section('content')
    <div>
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
        <form class="form-edited" action="{{ route('cadastrar_funcionario') }}" method="POST" enctype="multipart/form-data">
            <h1 class="text-2xl text-bold text-center mb-3">Cadastrar Funcionário</h1>
            @csrf
            <div class="mb-3">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" value="{{ old('senha') }}" required>
            </div>
            <div class="mb-3">
                <label for="cargo">Cargo:</label>
                <select id="cargo" name="cargo" value="{{ old('cargo') }}" required>
                    <option value="#" selected disabled></option>
                    <option value="Garçom">Garçom</option>
                    <option value="Cozinheiro">Cozinheiro</option>
                    <option value="Gerente">Gerente</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="salario">Salário(R$):</label>
                <input type="text" id="salario" name="salario" value="{{ old('salario') }}" required>
            </div>
            <div class="mb-3">
                <label for="imagem">Foto:</label>
                <div style="display: flex; flex-direction: row;">
                    <input type="file" id="imagem" name="foto" style="color: white !important;" required>
                    <img id="preview-imagem" src="" alt="Pré-visualização da imagem" width="100" height="100"
                        style="display: none;">
                </div>
            </div>
            <div class="align-self-end"><button type="submit" class="btn btn-success btn-lg">Cadastrar Funcionário</button"></div>
        </form>
    </div>
    @if($dados -> count() > 0)
    <div class="card-main">
        <div class="d-flex flex-column">
            <div class="d-flex align-self-center">
                <h1 class="text-2xl text-bold text-center">Funcionários</h1>
            </div>
            <div class="card-container">
                @foreach ($dados as $funcionario)
                    <div class="card-hover card-funcionarios">
                        <img class="card-img" src="{{ asset('storage/' . $funcionario->foto) }}" alt="Foto do Funcionário">
                        <div class="card-body-container">
                            <h5 class="card-title text-xl">{{ $funcionario->usuario->name }}</h5>
                            <p class="card-text"><strong>Email:</strong> {{ $funcionario->usuario->email }}</p>
                            <p class="card-text"><strong>Cargo:</strong> {{ $funcionario->cargo }}</p>
                            <p class="card-text"><strong>Salário:</strong> {{ $funcionario->salario }}</p>
                            <div class="btn-container">
                                <a href="{{ route('editar_funcionario', $funcionario->id) }}"
                                    class="btn btn-primary">Editar</a>
                                <a href="{{ route('deletar_funcionario', $funcionario->usuario_id) }}"
                                    class="btn btn-danger">Deletar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            {{ $dados->links('pagination::custom-main') }}
        </div>
    </div>
    @endif
@endsection
