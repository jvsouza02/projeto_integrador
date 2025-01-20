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
                            <a class='btn btn-success' href=''>Alterar Status</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
