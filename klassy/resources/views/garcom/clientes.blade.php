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
                    <form action="#" method="post">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="Digite seu nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Digite seu email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" placeholder="Digite seu telefone"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="numero_pessoas" class="form-label">Quantidade de Pessoas</label>
                            <input type="number" class="form-control" id="numero_pessoas"
                                placeholder="Digite o número de pessoas" required>
                        </div>
                        <div class="mb-3">
                            <label for="data" class="form-label">Data</label>
                            <input type="date" class="form-control" id="data" required>
                        </div>
                        <div class="mb-3">
                            <label for="hora" class="form-label">Horário</label>
                            <input type="time" class="form-control" id="hora" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar Reserva</button>
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
                    <td><a href="">Ver pedidos</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection