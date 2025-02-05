<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Nosso Cardápio</h6>
                    <h2>Nossa seleção de bolos com sabor de qualidade</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">
                @foreach ($data as $refeicao)
                    @if ($refeicao->disponivel == 1)
                        <div class="item">
                            <div class='card'
                                style="background-image: url('{{ asset('storage/' . $refeicao->imagem) }}'); background-size: cover; background-position: center;">
                                <div class="price">
                                    <h6>{{ $refeicao->preco }}</h6>
                                </div>
                                <div class='info'>
                                    <h1 class='title'>{{ $refeicao->nome }}</h1>
                                    <p class='description'>{{ $refeicao->descricao }}</p>
                                    <div class="main-text-button">
                                        <div class="scroll-to-section">
                                            <a href="{{ route('adicionar_carrinho', $refeicao->idRefeicao) }}">Adicionar ao
                                            carrinho<i class="fa fa-angle-down"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
