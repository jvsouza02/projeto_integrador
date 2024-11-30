@extends('admin.admin_principal')

@section('content')
    <div class="container mt-4">
        <h1>Usuários</h1>
        <table class="table table-striped table-hover table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        @if ($usuario->tipo_usuario == 0)
                            <td><a class="btn btn-danger" href="{{ route('admin.deletar_usuario', $usuario->id) }}">Deletar</a>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
