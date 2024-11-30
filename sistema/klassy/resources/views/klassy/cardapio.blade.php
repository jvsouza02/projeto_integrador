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
                @foreach ($data as $prato)
                    <div class="item">
                        <div class='card'
                            style="background-image: url('{{ asset('storage/' . $prato->imagem) }}'); background-size: cover; background-position: center;">
                            <div class="price">
                                <h6>{{ $prato->preco }}</h6>
                            </div>
                            <div class='info'>
                                <h1 class='title'>{{ $prato->nome }}</h1>
                                <p class='description'>{{ $prato->descricao }}</p>
                                <div class="main-text-button">
                                    <div class="scroll-to-section"><a href="#reservation">Adicionar ao carrinho<i
                                                class="fa fa-angle-down"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
