@extends('admin.admin_principal')

@section('content')
    <div class="d-flex flex-column">
        <div>
            @if(@session('success'))
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
        <form class="form-edited" action="{{ route('atualizar_funcionario', $funcionario->idFuncionario) }}" method="POST"
            enctype="multipart/form-data">
            <h1 class="text-2xl text-bold text-center mb-3">Editar Funcionário</h1>
            @csrf
            <div class="mb-3">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ $funcionario->usuario->name }}" disabled>
            </div>
            <div class="mb-3">
                <label for="cargo">Cargo:</label>
                <select id="cargo" name="cargo" value="{{ $funcionario->cargo }}" required>
                    <option value="Garçom">Garçom</option>
                    <option value="Cozinheiro">Cozinheiro</option>
                    <option value="Gerente">Gerente</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="salario">Salário(R$):</label>
                <input type="text" id="salario" name="salario" value="{{ $funcionario->salario }}" required>
            </div>
            <div class="mb-3">
                <label for="imagem">Foto:</label>
                <div style="display: flex; flex-direction: row;">
                    <input type="file" id="imagem" name="foto" style="color: white !important;">
                    <img id="preview-imagem" src="" alt="Pré-visualização da imagem" width="100" height="100"
                        style="display: none;">
                </div>
            </div>
            <div class="align-self-end"><button type="submit" class="btn btn-success btn-lg">Atualizar Funcionário</button>
            </div>
        </form>
    </div>
@endsection
