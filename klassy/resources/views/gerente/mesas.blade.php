@extends('admin.admin_principal')

@section('content')
    <div class="container">
        <h1 class="text-2xl text-bold text-center mb-3">Mesas</h1>
        <div class="d-flex justify-end">
            <button type="button" class="underline" data-toggle="modal" data-target="#cadastrarMesaModal">Cadastrar
                Mesa</button>
        </div>
        <table class="table table-striped table-hover table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>Número da Mesa</th>
                    <th>Quantidade de Lugares</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="text-white">
                @foreach ($dados as $mesa)
                    <tr>
                        <td>{{ $mesa->numero }}</td>
                        <td>{{ $mesa->capacidade }}</td>
                        <td>{{ $mesa->status }}</td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal"
                                data-target="#editarMesaModal{{ $mesa->id }}"><i class="bi bi-pencil-fill"></i></button>
                            <a class="btn btn-danger" href="{{ route('gerente.deletar_mesa', $mesa->id) }}"><i
                                    class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>
                    <!-- Modal Editar -->
                    <div class="modal fade" id="editarMesaModal{{ $mesa->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="editarMesaModalLabel{{ $mesa->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarMesaModalLabel{{ $mesa->id }}">Editar Mesa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('gerente.editar_mesa', $mesa->id) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="numeroMesa">Número da mesa</label>
                                            <input type="text" class="form-control" id="numeroMesa" name="numeroMesa"
                                                value="{{ $mesa->numero }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="capacidade">Quantidade de lugares</label>
                                            <select class="form-control" id="qtdLugares" name="capacidade" required>
                                                <option value="">Selecione</option>
                                                <option value="1" {{ $mesa->capacidade == 1 ? 'selected' : '' }}>01
                                                    Pessoa</option>
                                                <option value="2" {{ $mesa->capacidade == 2 ? 'selected' : '' }}>02
                                                    Pessoas</option>
                                                <option value="3" {{ $mesa->capacidade == 3 ? 'selected' : '' }}>03
                                                    Pessoas</option>
                                                <option value="4" {{ $mesa->capacidade == 4 ? 'selected' : '' }}>04
                                                    Pessoas</option>
                                                <option value="5" {{ $mesa->capacidade == 5 ? 'selected' : '' }}>05
                                                    Pessoas</option>
                                                <option value="6" {{ $mesa->capacidade == 6 ? 'selected' : '' }}>06
                                                    Pessoas</option>
                                                <option value="7" {{ $mesa->capacidade == 7 ? 'selected' : '' }}>07
                                                    Pessoas</option>
                                                <option value="8" {{ $mesa->capacidade == 8 ? 'selected' : '' }}>08
                                                    Pessoas</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="disponibilidade">Disponibilidade</label>
                                            <select class="form-control" id="disponibilidade" name="disponibilidade"
                                                required>
                                                <option value="Disponivel"
                                                    {{ $mesa->disponibilidade == 'Disponivel' ? 'selected' : '' }}>
                                                    Disponível</option>
                                                <option value="Indisponivel"
                                                    {{ $mesa->disponibilidade == 'Indisponivel' ? 'selected' : '' }}>
                                                    Indisponível</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Modal Cadastrar -->
    <div class="modal fade" id="cadastrarMesaModal" tabindex="-1" role="dialog" aria-labelledby="cadastrarMesaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadastrarMesaModalLabel">Cadastrar Mesa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('gerente.cadastrar_mesa') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="numeroMesa">Número da mesa</label>
                            <input type="text" class="form-control" id="numeroMesa" name="numeroMesa" required>
                        </div>
                        <div class="form-group">
                            <label for="capacidade">Quantidade de lugares</label>
                            <select class="form-control" id="qtdLugares" name="capacidade" required>
                                <option value="">Selecione</option>
                                <option value="1">01 Pessoa</option>
                                <option value="2">02 Pessoas</option>
                                <option value="3">03 Pessoas</option>
                                <option value="4">04 Pessoas</option>
                                <option value="5">05 Pessoas</option>
                                <option value="6">06 Pessoas</option>
                                <option value="7">07 Pessoas</option>
                                <option value="8">08 Pessoas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="disponibilidade">Disponibilidade</label>
                            <select class="form-control" id="disponibilidade" name="disponibilidade" required>
                                <option value="Disponivel">Disponível</option>
                                <option value="Indisponivel">Indisponível</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
