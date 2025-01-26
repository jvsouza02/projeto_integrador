@extends('admin.admin_principal')

@section('content')
    <div class="container">
        <h1 class="text-2xl text-bold text-center mb-3">Pedidos</h1>
        <table class="table table-striped table-hover table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Refeicao</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $pedido)
                    <tr>
                        <td>{{ $pedido->cliente->name }}</td>
                        <td>{{ $pedido->refeicao }}</td>
                        <td>{{ $pedido->quantidade }}</td>
                        <td>{{ $pedido->preco }}</td>
                        <td>{{ $pedido->status }}</td>
                        <td>
                            <button class='btn btn-success' data-toggle="modal" data-target="#alterarStatusModal{{ $pedido->id }}">Alterar
                                Status</button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="alterarStatusModal{{ $pedido->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="alterarStatusModalLabel{{ $pedido->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="alterarStatusModalLabel{{ $pedido->id }}">Alterar Status do Pedido</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('funcionarios.alterar_status') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="Pronto">Pronto</option>
                                                <option value="Entregue">Entregue</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="id_pedido" value="{{ $pedido->id }}">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
