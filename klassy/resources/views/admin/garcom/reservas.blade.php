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
    <!-- Modal de reserva -->
    <div class="modal fade" id="reservarModal" tabindex="-1" aria-labelledby="reservarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-2xl" id="reservarModalLabel">Fazer Reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('garcom.reservar')}}" method="post">
                        @csrf
                        <input type="text" name="id_usuario" id="id_usuario" hidden>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite seu nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Digite seu telefone"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="id_mesa">Mesa</label>
                            <select id="id_mesa" name="id_mesa" required class="form-control">
                                <option value="" selected disabled>@if(!$mesas->isEmpty())Selecione a mesa @else Nenhuma mesa disponível @endif</option>
                                @foreach ($mesas as $mesa)
                                    <option value="{{ $mesa->idMesa }}">{{ $mesa->numero }} - {{ $mesa->capacidade }} Pessoas</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="data" class="form-label">Data</label>
                            <input type="date" class="form-control" id="data" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="hora" class="form-label">Horário</label>
                            <input type="time" class="form-control" id="hora" name="time" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar Reserva</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h1 class="text-2xl text-bold text-center mb-3">Reservas</h1>
    <div class="d-flex justify-content-end">
        <button class="underline" data-bs-toggle="modal" data-bs-target="#reservarModal">Fazer reserva</button>
    </div>

    <table class="table table-striped table-hover table-dark">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Mesa</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody class="text-white">
            @foreach ($dados as $reserva)
                <tr>
                    <td>{{ $reserva->nome }}</td>
                    <td>{{ $reserva->email }}</td>
                    <td>{{ $reserva->telefone }}</td>
                    <td>{{ $reserva->mesa->numero }}</td>
                    <td>{{ \Carbon\Carbon::parse($reserva->data)->format('d/m/Y') }}</td>
                    <td>{{ $reserva->hora }}</td>
                    <td>@if($reserva->idCliente != null) <a href="{{route('garcom.pedidos_cliente', $reserva->idReserva)}}">Ver pedidos</a> |@endif <a href="{{route('garcom.cancelar_reserva', $reserva->idReserva)}}">Excluir</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
