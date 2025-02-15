@foreach ($refeicoes as $refeicao)
    <div class="item">
        <div class="card"
            style="background-image: url('{{ asset('storage/' . $refeicao->imagem) }}');
                background-size: cover;
                background-position: center;">
            <div class="price">
                <h6>{{ number_format($refeicao->preco, 2, ',', '.') }}</h6>
            </div>
            <div class="info">
                <h1 class="title">{{ $refeicao->nome }}</h1>
                <p class="description">{{ $refeicao->descricao }}</p>
                <div class="main-text-button">
                    <div class="scroll-to-section">
                        <a href="{{ route('adicionar_carrinho', $refeicao->idRefeicao) }}">
                            Adicionar ao carrinho <i class="fa fa-angle-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
