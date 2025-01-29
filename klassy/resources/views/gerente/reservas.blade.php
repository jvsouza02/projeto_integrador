@extends('admin.admin_principal')

@section('content')
    <div class="container">
        <h1 class="text-2xl text-bold text-center mb-3">Reservas</h1>
        <table class="table table-striped table-hover table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Quantidade de Pessoas</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $reserva)
                    <tr>
                        <td>{{ $reserva->nome }}</td>
                        <td>{{ $reserva->email }}</td>
                        <td>{{ $reserva->telefone }}</td>
                        <td>{{ $reserva->numero_pessoas }}</td>
                        <td>{{ $reserva->data }}</td>
                        <td>{{ $reserva->hora }}</td>
                        <td><a class="btn btn-danger" href="{{route('cancelar_reserva', $reserva->id)}}">Cancelar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
