@extends('klassy.layout')

@section('content')
    <div class="container mt-32">
        <div class="d-flex justify-end"><a class="btn btn-sm btn-warning" href="{{ route('home', '#reservation') }}">Fazer
                reserva</a></div>
        <table class="table table-striped table-hover table-contextual mt-1">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Quantidade de Pessoas</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Ações</th>
            </tr>
            @foreach ($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->nome }}</td>
                    <td>{{ $reserva->email }}</td>
                    <td>{{ $reserva->telefone }}</td>
                    <td>{{ $reserva->numero_pessoas }}</td>
                    <td>{{ $reserva->data }}</td>
                    <td>{{ $reserva->hora }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Editar</button>
                        <a class="btn btn-danger btn-sm" href="">Deletar</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
