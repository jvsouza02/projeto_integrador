@extends('klassy.layout')

@section('content')
    <div class="container mt-32">
        <h2 class="mb-4 text-2xl font-bold">Meus Pedidos</h2>

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
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Itens do Pedido:</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Refeição</th>
                                    <th>Quantidade</th>
                                    <th>Preço Unitário</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedido->pedidoItens as $item)
                                    <tr>
                                        <td>{{ $item->refeicao->nome }}</td>
                                        <td>{{ $item->quantidade }}</td>
                                        <td>R$ {{ number_format($item->valorUnitario, 2, ',', '.') }}</td>
                                        <td>R$ {{ number_format($item->quantidade * $item->valorUnitario, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-end">
                            <strong>Total do Pedido: R$ {{ number_format($pedido->valorTotal, 2, ',', '.') }}</strong>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mb-10">
                {{ $pedidos->links('pagination::custom-main') }}
            </div>
        @endif
    </div>
@endsection
