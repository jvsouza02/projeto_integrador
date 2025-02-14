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
        <h2 class="mb-4 text-2xl font-bold">Pedidos</h2>

        @if ($pedidos->isEmpty())
            <div class="alert alert-info">
                Nenhum pedido encontrado.
            </div>
        @else
            @foreach ($pedidos as $pedido)
                <div class="card mb-4">
                    <div class="card-header">
                        Pedido #{{ $pedido->idPedido }} -
                        Data: {{ $pedido->created_at->format('d/m/Y H:i') }} -
                        Status: {{ ucfirst($pedido->status) }}

                        <div class="float-right">
                            <!-- Botão Alterar Status -->
                            @if ($pedido->status != 'Entregue')
                                <button class="btn btn-success btn-md" data-toggle="modal"
                                    data-target="#alterarStatusModal{{ $pedido->idPedido }}">
                                    Alterar Status
                                </button>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Itens do Pedido:</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-white">Refeição</th>
                                    <th class="text-white">Quantidade</th>
                                    <th class="text-white">Preço Unitário</th>
                                    <th class="text-white">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedido->pedidoItens as $item)
                                    <tr class="text-white">
                                        <td>{{ $item->refeicao->nome }}</td>
                                        <td>{{ $item->quantidade }}</td>
                                        <td>R$ {{ number_format($item->valorUnitario, 2, ',', '.') }}</td>
                                        <td>R$ {{ number_format($item->quantidade * $item->valorUnitario, 2, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-end">
                            <strong>Total do Pedido: R$ {{ number_format($pedido->valorTotal, 2, ',', '.') }}</strong>
                        </div>
                    </div>
                </div>

                <!-- Modal para Alterar Status -->
                <div class="modal fade" id="alterarStatusModal{{ $pedido->idPedido }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('funcionarios.alterar_status') }}" method="POST">
                                @csrf
                                <input type="text" name="idPedido" value="{{ $pedido->idPedido }}" hidden>
                                <div class="modal-header">
                                    <h5 class="modal-title">Alterar Status do Pedido #{{ $pedido->idPedido }}</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Novo Status:</label>
                                        <select name="novo_status" class="form-control" required>
                                            <option value="Em espera" {{ $pedido->status == 'Em espera' ? 'selected' : '' }}>Em espera</option>
                                            <option value="Em andamento" {{ $pedido->status == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                                            <option value="Pronto" {{ $pedido->status == 'Pronto' ? 'selected' : '' }}>Pronto</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
