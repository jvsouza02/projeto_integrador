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
                            @if ($pedido->status == 'Em espera')
                                <a class='btn btn-danger' href=''>Editar</a>
                            @elseif($pedido->status == 'Pronto')
                                <a class='btn btn-success' href=''>Alterar Status</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
