<div class="owl-menu-item owl-carousel" id="menuItems">
    @foreach ($meals as $refeicao)
    <div class="item">
        <div class="card" style="background-image: url('{{ asset('storage/' . $refeicao->imagem) }}')">
            <div class="price"><h6>R$ {{ number_format($refeicao->preco, 2, ',', '.') }}</h6></div>
            <div class="info">
                <h1 class="title">{{ $refeicao->nome }}</h1>
                <p class="description">{{ $refeicao->descricao }}</p>
                <div class="main-text-button">
                    <a href="{{ route('adicionar_carrinho', $refeicao->idRefeicao) }}">
                        Adicionar ao carrinho <i class="fa fa-angle-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
