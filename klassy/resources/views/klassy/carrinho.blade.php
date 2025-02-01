@extends('klassy.layout')

@section('content')
    <div class="container mt-32">
        @if ($itens->count() == 0)
            <div class="alert alert-danger">
                <h1>Não há itens no carrinho.</h1>
                <a class="btn btn-sm btn-warning" href="{{ route('home', '#menu') }}">Fazer pedido</a>
            </div>
        @else
            <form action="{{ route('finalizar_pedido') }}" method="POST">
                @csrf
                <table class="table table-striped table-hover table-contextual">
                    <tr>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Remover</th>
                    </tr>
                    @foreach ($carrinho_itens as $refeicao)
                        <tr>
                            <td><input type="text" name="nome[]" value="{{ $refeicao->nome }}" class="border-0" readonly>
                            </td>
                            <td><input type="number" name="quantidade[]" value="{{ $refeicao->quantidade }}"
                                    class="border-0"></td>
                            <td><input type="text" name="preco[]" value="{{ $refeicao->preco }}" class="border-0"
                                    readonly></td>
                            <td><a href="{{ route('remover_carrinho', $refeicao->id) }}"><i
                                        class="fa fa-trash text-2xl"></i></a></td>
                        </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ route('home') }}" class="btn btn-dark">Continuar Comprando</a>
                    <button type="submit" class="btn btn-success">Finalizar Pedido</button>
                </div>
            </form>
        @endif
    </div>
@endsection
