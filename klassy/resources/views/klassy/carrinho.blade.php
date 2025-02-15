@extends('klassy.layout')

@section('content')
    <div class="container mt-40">
        <div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        @if ($carrinho_itens_count == 0)
            <div class="alert alert-danger text-center py-5">
                <h1 class="mb-4">Seu carrinho está vazio</h1>
                <a class="btn btn-lg btn-warning" href="{{ route('home', '#menu') }}">
                    <i class="fas fa-utensils me-2"></i>Ver Cardápio
                </a>
            </div>
        @else
            <form action="{{ route('carrinho_atualizar') }}" method="POST" id="form-carrinho">
                @csrf
                <div class="table-responsive rounded-3 shadow-sm">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 120px;">Imagem</th>
                                <th>Produto</th>
                                <th style="width: 150px;">Quantidade</th>
                                <th style="width: 150px;">Preço Unitário</th>
                                <th style="width: 100px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carrinho->carrinhoItens as $item)
                                <tr class="bg-white">
                                    <td>
                                        <img src="{{ asset('storage/' . $item->refeicao->imagem) }}"
                                            class="img-fluid rounded-3"
                                            style="width: 80px; height: 80px; object-fit: cover;"
                                            alt="{{ $item->refeicao->nome }}">
                                    </td>
                                    <td>
                                        <h5 class="mb-0">{{ $item->refeicao->nome }}</h5>
                                    </td>
                                    <td>
                                        <input type="number" min="1" name="quantidade[{{ $item->idCarrinhoItem }}]"
                                            value="{{ $item->quantidade }}" class="form-control form-control-sm"
                                            min="1" style="width: 80px;">
                                    </td>
                                    <td>
                                        <span class="fw-bold">R$
                                            {{ number_format($item->refeicao->preco, 2, ',', '.') }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('remover_carrinho', $item->refeicao->idRefeicao) }}"
                                            class="btn btn-danger btn-sm py-1 px-2" title="Remover item">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4 p-3 bg-light rounded-3 shadow-sm">
                    <a href="{{ route('home') }}" class="btn btn-outline-dark">
                        <i class="fas fa-chevron-left me-2"></i>Continuar Comprando
                    </a>

                    <div class="d-flex align-items-center gap-3">
                        <span class="h5 mb-0 d-none d-md-block me-3">
                            Total: <span id="total-preview">R$
                                {{ number_format($carrinho->total ?? 0, 2, ',', '.') }}</span>
                        </span>
                        <button type="button" id="btn-finalizar-pedido" class="btn btn-success btn-lg">
                            <i class="fas fa-check-circle me-2"></i>Finalizar Pedido
                        </button>
                    </div>
                </div>
            </form>

            <!-- Modal de Confirmação -->
            <div class="modal fade" id="finalizarModal" tabindex="-1" aria-labelledby="finalizarModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="finalizarModalLabel">Confirmação de Pedido</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <i class="fas fa-shopping-cart fa-3x text-success mb-3"></i>
                                <h4 class="mb-3">Confirmar compra?</h4>
                                <p class="lead fw-bold">Total: <span id="valor-total" class="text-success">R$ 0,00</span>
                                </p>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                                <i class="fas fa-times me-2"></i>Cancelar
                            </button>
                            <a href="{{ route('finalizar_pedido') }}" class="btn btn-success px-4">
                                <i class="fas fa-check me-2"></i>Confirmar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const btnFinalizar = document.getElementById('btn-finalizar-pedido');

                    if (btnFinalizar) {
                        btnFinalizar.addEventListener('click', function() {
                            const form = document.getElementById('form-carrinho');
                            const formData = new FormData(form);

                            fetch("{{ route('carrinho_atualizar') }}", {
                                    method: 'POST',
                                    body: formData,
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                            .content,
                                        'Accept': 'application/json'
                                    }
                                })
                                .then(response => {
                                    if (!response.ok) throw new Error('Erro na atualização');
                                    return response.json();
                                })
                                .then(data => {
                                    document.getElementById('valor-total').textContent =
                                        'R$ ' + data.total.toFixed(2).replace('.', ',');

                                    // Atualiza preview do total
                                    document.getElementById('total-preview').textContent =
                                        'R$ ' + data.total.toFixed(2).replace('.', ',');

                                    new bootstrap.Modal(document.getElementById('finalizarModal')).show();
                                })
                                .catch(error => {
                                    console.error('Erro:', error);
                                    alert('Erro ao atualizar o carrinho');
                                });
                        });
                    }
                });
            </script>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Função que calcula e atualiza o total do carrinho
                    function atualizarTotal() {
                        let total = 0;

                        // Seleciona todas as linhas do corpo da tabela
                        const rows = document.querySelectorAll("table tbody tr");

                        rows.forEach(function(row) {
                            // Seleciona o input de quantidade da linha
                            const inputQuantidade = row.querySelector('input[type="number"]');
                            if (inputQuantidade) {
                                const quantidade = parseFloat(inputQuantidade.value) || 0;

                                // Seleciona a célula do preço unitário (4ª coluna)
                                const precoCell = row.cells[3];
                                if (precoCell) {
                                    // Extrai o texto do preço (no formato "R$ 12,50")
                                    let precoTexto = precoCell.textContent.trim();
                                    // Remove "R$" e converte a vírgula em ponto
                                    precoTexto = precoTexto.replace('R$', '').trim().replace(',', '.');
                                    const preco = parseFloat(precoTexto) || 0;

                                    total += quantidade * preco;
                                }
                            }
                        });

                        // Atualiza o elemento com o id "total-preview"
                        const totalPreview = document.getElementById('total-preview');
                        if (totalPreview) {
                            totalPreview.textContent = 'R$ ' + total.toFixed(2).replace('.', ',');
                        }
                    }

                    // Atualiza o total ao carregar a página
                    atualizarTotal();

                    // Adiciona o listener para cada input do tipo number
                    const inputs = document.querySelectorAll('input[type="number"]');
                    inputs.forEach(function(input) {
                        // O evento 'input' é acionado enquanto o usuário digita
                        input.addEventListener('input', atualizarTotal);
                        // O evento 'change' é acionado quando o campo perde o foco, se preferir
                        input.addEventListener('change', atualizarTotal);
                    });
                });
            </script>
        @endif
    </div>
@endsection
