@extends('klassy.layout')

@section('content')
    <div class="container mt-32">
        @if ($pedidos->count() == 0)
            <div class="alert alert-danger">
                <h1>Não há pedidos cadastrados.</h1>
                <a class="btn btn-sm btn-warning" href="{{ route('home', '#menu')}}">Fazer pedido</a>
            </div>
        @else
            <div class="d-flex justify-end"><a class="btn btn-sm btn-warning" href="{{ route('home', '#menu') }}">Fazer
                    pedido</a></div>
            <table class="table table-striped table-hover table-contextual mt-1">
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
                    @foreach ($pedido_itens as $pedido)
                        <tr>
                            <td>{{ $pedido->cliente->usuario->name }}</td>
                            <td>{{ $pedido->refeicao }}</td>
                            <td>{{ $pedido->quantidade }}</td>
                            <td>{{ $pedido->preco }}</td>
                            <td class="{{$pedido->status == 'Pronto' ? 'text-success' : 'text-primary'}}">{{ $pedido->status }}</td>
                            <td>
                                @if ($pedido->status == 'Em espera')
                                    <a href="{{ route('cancelar_pedido', $pedido->idPedido) }}" class="btn btn-sm btn-danger">Cancelar</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
