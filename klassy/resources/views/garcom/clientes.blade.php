@extends('admin.admin_principal')

@section('content')
<div class="container">
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
                            <select id="numero_pessoas" name="numero_pessoas" required class="form-control">
                                <option value="" selected disabled>Selecione o número de pessoas</option>
                                <option value="1">01 Pessoa</option>
                                <option value="2">02 Pessoas</option>
                                <option value="3">03 Pessoas</option>
                                <option value="4">04 Pessoas</option>
                                <option value="5">05 Pessoas</option>
                                <option value="6">06 Pessoas</option>
                                <option value="7">07 Pessoas</option>
                                <option value="8">08 Pessoas</option>
                                <option value="9">09 Pessoas</option>
                                <option value="10">10 Pessoas</option>
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
    <h1 class="text-2xl text-bold text-center mb-3">Clientes</h1>
    <div class="d-flex justify-content-end">
        <button class="underline" data-bs-toggle="modal" data-bs-target="#reservarModal">Fazer reserva</button>
    </div>

    <table class="table table-striped table-hover table-dark">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Quantidade de Pessoas</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Ação</th>
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
                    <td><a href="">Ver pedidos</a> | <a href="{{route('garcom.cancelar_reserva', $reserva->idReserva)}}">Cancelar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
