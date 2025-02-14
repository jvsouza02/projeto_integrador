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
        <h1 class="text-2xl text-bold text-center mb-3">Contatos</h1>
        <table class="table table-striped table-hover table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Assunto</th>
                    <th>Mensagem</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $contato)
                    <tr class="text-white">
                        <td>{{ $contato->nome }}</td>
                        <td>{{ $contato->email }}</td>
                        <td>{{ $contato->assunto }}</td>
                        <td>{{ $contato->mensagem }}</td>
                        <td><a class="btn btn-danger" href="{{route('deletar_mensagem', $contato->idContato)}}">Deletar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $dados->links('pagination::custom-main') }}
        </div>
    </div>
@endsection
