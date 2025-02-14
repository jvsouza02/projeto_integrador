@extends('klassy.layout')

@section('content')
    <div class="container mt-32">
        <div>
            @if (@session('success'))
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
        <h1 class="text-2xl font-bold mb-3">Reservas</h1>
        @if ($reservas->count() == 0)
            <div class="alert alert-danger">
                <h1>Não há reservas cadastradas.</h1>
                <a class="btn btn-sm btn-warning" href="{{ route('home', '#reservation') }}">Fazer reserva</a>
            </div>
        @else
            @foreach ($reservas as $reserva)
                <div class="card mb-4">
                    <div class="card-header">
                        Reserva #{{ $reserva->idReserva }} -
                        Data: {{ \Carbon\Carbon::parse($reserva->data)->format('d/m/Y') }} -
                        Horário: {{ $reserva->hora }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title font-bold">Detalhes da Reserva</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nome</th>
                                    <td>{{ $reserva->nome }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $reserva->email }}</td>
                                </tr>
                                <tr>
                                    <th>Telefone</th>
                                    <td>{{ $reserva->telefone }}</td>
                                </tr>
                                <tr>
                                    <th>Mesa</th>
                                    <td>{{ $reserva->mesa->numero }}</td>
                                </tr>
                                <tr>
                                    <th>Observação</th>
                                    <td>{{ $reserva->observacao ?? 'Nenhuma observação.' }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $reserva->idReserva }}">Editar</button>
                            <a class="btn btn-danger btn-sm"
                                href="{{ route('cancelar_reserva', $reserva->idReserva) }}">Cancelar</a>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $reserva->idReserva }}" tabindex="-1"
                    aria-labelledby="editModalLabel{{ $reserva->idReserva }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="editModalLabel{{ $reserva->idReserva }}">Editar Reserva</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <!-- Modal Body -->
                            <form id="editForm{{ $reserva->idReserva }}" method="POST"
                                action="{{ route('atualizar_reserva') }}">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="idReserva" value="{{ $reserva->idReserva }}">

                                    <!-- Nome -->
                                    <div class="mb-3">
                                        <label for="nome" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" required
                                            value="{{ $reserva->nome }}">
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required
                                            value="{{ $reserva->email }}">
                                    </div>

                                    <!-- Telefone -->
                                    <div class="mb-3">
                                        <label for="telefone" class="form-label">Telefone</label>
                                        <input type="text" class="form-control" id="telefone" name="telefone" required
                                            value="{{ $reserva->telefone }}">
                                    </div>

                                    <!-- Data -->
                                    <div class="mb-3">
                                        <label for="date-update" class="form-label">Data</label>
                                        <input type="date" class="form-control" id="date-update" name="date" required
                                            value="{{ $reserva->data }}">
                                    </div>

                                    <!-- Horário -->
                                    <div class="mb-3">
                                        <label for="time-update" class="form-label">Horário</label>
                                        <input type="time" class="form-control" id="time-update" name="time" required
                                            value="{{ $reserva->hora }}">
                                    </div>

                                    <!-- Observação -->
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Observação</label>
                                        <textarea class="form-control" id="message" name="message" rows="3">{{ $reserva->observacao }}</textarea>
                                    </div>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div>
        {{ $reservas->links('pagination::custom-main') }}
    </div>
@endsection
