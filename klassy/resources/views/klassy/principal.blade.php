@extends('klassy.layout')

@section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>KlassyCafe</h4>
                            <h6>A MELHOR EXPERIÊNCIA</h6>
                            <div class="main-white-button scroll-to-section">
                                <a href="#reservation">Faça uma Reserva</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="assets/images/slide-01.jpg" alt="">
                                </div>
                            </div>
                            <!-- // Item -->
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="assets/images/slide-02.jpg" alt="">
                                </div>
                            </div>
                            <!-- // Item -->
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="assets/images/slide-03.jpg" alt="">
                                </div>
                            </div>
                            <!-- // Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Sobre Nós</h6>
                            <h2>Criamos Memórias Deliciosas para Você</h2>
                        </div>
                        <p>O Klassy Cafe é um dos melhores <a href="https://templatemo.com/tag/restaurant" target="_blank"
                                rel="sponsored">templates HTML para restaurantes</a> com o framework CSS
                            Bootstrap v4.5.2.
                            Você pode baixar e usar gratuitamente este layout de template de site para o seu negócio de
                            restaurante.
                            Você está autorizado a usar este template para fins comerciais.
                            <br><br>Você NÃO está autorizado a redistribuir o arquivo ZIP do template em qualquer site
                            de download de templates. Por favor, entre em contato conosco para mais informações.
                        </p>

                        <div class="row">
                            <div class="col-4">
                                <img src="assets/images/about-thumb-01.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img src="assets/images/about-thumb-02.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img src="assets/images/about-thumb-03.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
                            <a rel="nofollow" href="http://youtube.com"><i class="fa fa-play"></i></a>
                            <img src="assets/images/about-video-bg.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Menu Area Starts ***** -->
    @include('klassy.cardapio')
    <!-- ***** Menu Area Ends ***** -->


    <!-- ***** Offers Area Starts ***** -->
    <section class="section" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Semana Klassy</h6>
                        <h2>Ofertas Especiais de Refeições Desta Semana</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            <div class="heading-tabs">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <ul>
                                            <li><a href='#tabs-1'><img src="assets/images/tab-icon-01.png"
                                                        alt="">Café da Manhã</a></li>
                                            <li><a href='#tabs-2'><img src="assets/images/tab-icon-02.png"
                                                        alt="">Almoço</a></a></li>
                                            <li><a href='#tabs-3'><img src="assets/images/tab-icon-03.png"
                                                        alt="">Jantar</a></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <section class='tabs-content'>
                                <article id='tabs-1'>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="left-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-01.png" alt="">
                                                            <h4>Salada de Frango Fresco</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$10.50</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-02.png" alt="">
                                                            <h4>Suco de Laranja</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$8.50</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-03.png" alt="">
                                                            <h4>Salada de Frutas</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$9.90</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="right-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-04.png" alt="">
                                                            <h4>Omelete de Ovos</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$6.50</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-05.png" alt="">
                                                            <h4>Dollma Pire</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$5.00</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-06.png" alt="">
                                                            <h4>Omelete com Queijo</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$4.10</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article id='tabs-2'>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="left-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-04.png" alt="">
                                                            <h4>Omelete de Ovos</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$14</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-05.png" alt="">
                                                            <h4>Dollma Pire</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$18</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-06.png" alt="">
                                                            <h4>Omelete de Queijo</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$22</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="right-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-01.png" alt="">
                                                            <h4>Salada de Frango Fresco</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$10</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-02.png" alt="">
                                                            <h4>Suco de Laranja</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-03.png" alt="">
                                                            <h4>Sala de Frutas</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$30</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article id='tabs-3'>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="left-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-05.png" alt="">
                                                            <h4>Omelete de Ovos</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$14</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-03.png" alt="">
                                                            <h4>Suco de Laranja</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$18</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-02.png" alt="">
                                                            <h4>Salada de Frutas</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$10</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="right-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-06.png" alt="">
                                                            <h4>Sala de Frango Fresco</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$8.50</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-01.png" alt="">
                                                            <h4>Dollma Pire</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$9</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-04.png" alt="">
                                                            <h4>Omelete de Queijo</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$11</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** offers Area Ends ***** -->

    <!-- ***** Reservation Area Starts ***** -->
    @include('klassy.reserva')
    <!-- ***** Reservation Area Ends ***** -->

    <!-- ***** Chefs Area Starts ***** -->
    @if (isset($funcionarios))
        <section class="section" id="chefs">
            <div class="container d-flex flex-column align-items-center">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4 text-center">
                        <div class="section-heading">
                            <h6>Nossa Equipe</h6>
                            <h2>Oferecemos os melhores ingredientes para você</h2>
                        </div>
                    </div>
                </div>
                <div class="row col-10 d-flex justify-content-center">
                    @foreach ($funcionarios as $funcionario)
                        <div class="col-lg-4"> <!-- Ajuste o número de colunas de acordo com o tamanho da tela -->
                            <div class="chef-item mt-2">
                                <div class="thumb">
                                    <div class="overlay"></div>
                                    <ul class="social-icons">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                    <img src="{{ asset('storage/' . $funcionario->foto) }}"
                                        style="height: 250px; width: 250px; object-fit: cover;">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $funcionario->usuario->name }}</h4>
                                    <span>{{ $funcionario->cargo }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">{{ $funcionarios->links('pagination::custom-main') }}</div>
            </div>
        </section>
    @endif
    <!-- ***** Chefs Area Ends ***** -->



    <!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="cont">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Contate-Nos</h6>
                            <h2>Aqui você pode nos enviar uma mensagem ou tirar suas dúvidas</h2>
                        </div>
                        <p>Entre em contato para mais informações, enviar sugestões ou esclarecer dúvidas. Estamos
                            prontos para ajudar!</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="phone">
                                    <i class="fa fa-phone"></i>
                                    <h4>Telefones</h4>
                                    <span><a href="#">080-090-0990</a><br><a href="#">080-090-0880</a></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="message">
                                    <i class="fa fa-envelope"></i>
                                    <h4>E-mails</h4>
                                    <span><a href="#">hello@company.com</a><br><a
                                            href="#">info@company.com</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form id="contact" action="" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>Contate-Nos</h4>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" id="name" placeholder="Seu Nome*"
                                            required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="email" id="email"
                                            placeholder="Seu Endereço de E-mail*" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input name="subject" type="text" id="subject" placeholder="Assunto*"
                                            required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="8" id="message" placeholder="Sua Mensagem*" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button-icon">Enviar
                                            Mensagem</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Contact Us Area Ends ***** -->



    <!-- ***** Reviews Area Start ***** -->

    <section class="reviews-section" id="reviews">
        <h2><strong>Veja as Opniões de Nossos Usuários</strong></h2>
        <br><br><br>
        <div class="reviews-carousel">
            <button class="carousel-button left">&#9664;</button>
            <div class="reviews-container">
                <div class="review">
                    <img src="assets/images/profile1.jpg" alt="John Doe">
                    <h3>John Doe</h3>
                    <p class="role">Web Designer</p>
                    <p class="comment">"Lorem ipsum dolor sit amet, consectetur adipisicing elit."</p>
                </div>
                <div class="review">
                    <img src="assets/images/profile2.jpg" alt="Steve Thomas">
                    <h3>Steve Thomas</h3>
                    <p class="role">UX/UI Designer</p>
                    <p class="comment">"Adipisci commodi, velit facilis tempora repellendus quidem."</p>
                </div>
                <div class="review">
                    <img src="assets/images/profile3.jpg" alt="Miranda Joy">
                    <h3>Miranda Joy</h3>
                    <p class="role">Graphic Designer</p>
                    <p class="comment">"Quisquam, minima! Nisi repellat hic mollitia perspiciatis!"</p>
                </div>
                <div class="review">
                    <img src="assets/images/profile4.jpg" alt="Emily Carter">
                    <h3>Emily Carter</h3>
                    <p class="role">Content Creator</p>
                    <p class="comment">"Lorem ipsum dolor sit amet, consectetur elit. Necessitatibus."</p>
                </div>
                <div class="review">
                    <img src="assets/images/profile5.jpg" alt="Alice Brown">
                    <h3>Alice Brown</h3>
                    <p class="role">Marketing Specialist</p>
                    <p class="comment">"Magnam quo expedita rem molestias aspernatur numquam."</p>
                </div>
                <div class="review">
                    <img src="assets/images/profile6.jpg" alt="Robert Smith">
                    <h3>Robert Smith</h3>
                    <p class="role">SEO Analyst</p>
                    <p class="comment">"Voluptatum eaque adipisci alias, eos atque tempore dolores."</p>
                </div>
                <div class="review">
                    <img src="assets/images/profile7.jpg" alt="Sophia Wilson">
                    <h3>Sophia Wilson</h3>
                    <p class="role">Social Media Manager</p>
                    <p class="comment">"Cupiditate ratione eligendi excepturi dolorum perspiciatis dicta."</p>
                </div>
                <div class="review">
                    <img src="assets/images/profile8.jpg" alt="Henry White">
                    <h3>Henry White</h3>
                    <p class="role">Software Developer</p>
                    <p class="comment">"Architecto incidunt doloremque velit ullam itaque necessitatibus."</p>
                </div>
                <div class="review">
                    <img src="assets/images/profile9.jpg" alt="Linda Green">
                    <h3>Linda Green</h3>
                    <p class="role">Project Manager</p>
                    <p class="comment">"Porro quas autem, voluptatem nostrum optio at."</p>
                </div>
                <div class="review">
                    <img src="assets/images/profile10.jpg" alt="Michael Gray">
                    <h3>Michael Gray</h3>
                    <p class="role">Data Analyst</p>
                    <p class="comment">"Tempore, doloribus cumque. Labore atque aperiam harum!"</p>
                </div>
            </div>
            <button class="carousel-button right">&#9654;</button>
        </div>
    </section>

    <!-- ***** Reviews Area Ends ***** -->


    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>® Klassy Cafe Restaurante

                            <br>Empresa Sediada em Natal-RN
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
