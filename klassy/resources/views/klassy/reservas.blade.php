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
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $reserva->id }}">Editar</button>
                        <a class="btn btn-danger btn-sm" href="{{ route('deletar_reserva', $reserva->id) }}">Deletar</a>
                    </td>
                </tr>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $reserva->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $reserva->id }}"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $reserva->id }}">Editar Reserva</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="editForm{{ $reserva->id }}" method="POST" action="{{ route('atualizar_reserva') }}">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="reserva-id" value="{{ $reserva->id }}">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" required value="{{ $reserva->nome }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required value="{{ $reserva->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" class="form-control" id="telefone" name="telefone" required value="{{ $reserva->telefone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="numero_pessoas">Quantidade de Pessoas</label>
                                        <input type="number" class="form-control" id="numero_pessoas" name="numero_pessoas"
                                            required value="{{ $reserva->numero_pessoas }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="data">Data</label>
                                        <input type="date" class="form-control" id="data" name="data" required value="{{ $reserva->data }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="hora">Horário</label>
                                        <input type="time" class="form-control" id="hora" name="hora" required value="{{ $reserva->hora }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
    </div>
@endsection
