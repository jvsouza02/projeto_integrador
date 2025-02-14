@extends('admin.admin_principal')

@section('content')
    <div class="container">
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
        <h1 class="text-2xl text-bold text-center mb-3">Usuários</h1>
        <table class="table table-striped table-hover table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo de Usuário</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->tipo_usuario }}</td>
                        @if ($usuario->tipo_usuario != 'Gerente')
                            <td><a class="btn btn-danger" href="{{ route('gerente.deletar_usuario', $usuario->id) }}">Deletar</a>
                        @else
                            <td>Não pode ser deletado</td>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
