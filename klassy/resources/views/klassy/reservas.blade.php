@extends('klassy.layout')

@section('content')
    <div class="container mt-32">
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
                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#editModal{{ $reserva->idReserva }}">Editar</button>
                            <a class="btn btn-danger btn-sm"
                                href="{{ route('cancelar_reserva', $reserva->idReserva) }}">Cancelar</a>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $reserva->idReserva }}" tabindex="-1" role="dialog"
                    aria-labelledby="editModalLabel{{ $reserva->idReserva }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $reserva->idReserva }}">Editar Reserva</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="editForm{{ $reserva->idReserva }}" method="POST"
                                action="{{ route('atualizar_reserva') }}">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="idReserva" value="{{ $reserva->idReserva }}">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome"
                                            required value="{{ $reserva->nome }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            required value="{{ $reserva->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" class="form-control" id="telefone" name="telefone"
                                            required value="{{ $reserva->telefone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="data">Data</label>
                                        <input type="date" class="form-control" id="date" name="date"
                                            required value="{{ $reserva->data }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="hora">Horário</label>
                                        <input type="time" class="form-control" id="time" name="time"
                                            required value="{{ $reserva->hora }}" style="color:#000 !important;">
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Observação</label>
                                        <textarea class="form-control" id="message" name="message"
                                            rows="3">{{ $reserva->observacao }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
