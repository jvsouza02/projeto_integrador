@extends('admin.admin_principal')

@section('content')
    <div class="container w-50 rounded-md bg-info">
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
        <h1 class="text-2xl text-bold text-center">Cadastrar Funcionário</h1>
        <form class="mt-4 w-1/4 p-2 text-white" action="{{ route('cadastrar_funcionario') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control text-black" id="nome" name="nome" value="{{ old('nome') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control text-black" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="senha" class="form-control text-black" id="senha" name="senha" value="{{ old('senha') }}" required>
            </div>
            <div class="mb-3">
                <label for="cargo" class="form-label">Cargo:</label>
                <select class="form-control text-black" id="cargo" name="cargo" value="{{ old('cargo') }}" required>
                    <option value="3">Garçom</option>
                    <option value="2">Cozinheiro</option>
                    <option value="1">Gerente</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="salario" class="form-label">Salário:</label>
                <input type="string" class="form-control text-black" id="salario" name="salario" value="{{ old('salario') }}" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" class="form-control" id="foto" name="foto" value="{{ old('foto') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Funcionário</button>
        </form>
    </div>
    <div class="container mt-5 flex flex-col align-items-center">
        <h1 class="text-2xl text-bold text-center">Funcionários Cadastrados</h1>
        <table class="table table-striped w-75">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Cargo</th>
                    <th>Salário</th>
                    <th>Foto</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $funcionario)
                    <tr>
                        <td>{{ $funcionario->usuario->name }}</td>
                        <td>{{ $funcionario->usuario->email }}</td>
                        <td>{{ $funcionario->cargo }}</td>
                        <td>{{ $funcionario->salario }}</td>
                        <td><img src="{{ asset('storage/' . $funcionario->foto) }}" class="w-25 h-25"></td>
                        <td><a class="btn btn-primary" href="{{ route('editar_funcionario', $funcionario->id) }}">Editar</a></td>
                        <td><a class="btn btn-danger" href="{{ route('deletar_funcionario', $funcionario->id) }}">Deletar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
