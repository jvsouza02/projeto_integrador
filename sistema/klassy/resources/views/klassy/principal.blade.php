<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <title>Klassy Cafe - Template HTML para Restaurantes</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">


</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


       <!-- ***** Preloader End ***** -->




<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- Logo -->
                    <a href="index.html" class="logo">
                        <img src="assets/images/klassy-logo.png" alt="Klassy Cafe HTML Template">
                    </a>

                    <!-- Menu -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Início</a></li>
                        <li class="scroll-to-section"><a href="#menu">Cardápio</a></li>
                        <li class="scroll-to-section"><a href="#reservation">Reserva</a></li>
                        <li class="submenu">
                            <a href="javascript:void(0);">Descubra</a>
                            <ul>
                                <li><a href="#about">Sobre Nós</a></li>
                                <li><a href="#chefs">Cozinheiros</a></li>
                                <li><a href="#cont">Contate-Nos</a></li>
                                <li><a href="#reviews">Avaliações</a></li>
                            </ul>
                        </li>

                        <!-- Carrinho com Dropdown -->
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            <ul>
                                <li><a href="#carrinho">Ver Carrinho</a></li>
                                <li><a href="#checkout">Finalizar Compra</a></li>
                                <li><a href="#clear-cart">Limpar Carrinho</a></li>
                            </ul>
                        </li>

                        @if (Route::has('login'))
                                @auth
                                    <li><x-app-layout></x-app-layout></li>
                                @else
                                    <li><a href="{{ route('login') }}">Fazer Login</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">Registrar-se</a></li>
                                    @endif
                                @endauth
                        @endif
                    </ul>

                    <!-- Botão Menu Trigger (Mobile) -->
                    <a class="menu-trigger">
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->




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
                        <p>O Klassy Cafe é um dos melhores <a href="https://templatemo.com/tag/restaurant" target="_blank" rel="sponsored">templates HTML para restaurantes</a> com o framework CSS Bootstrap v4.5.2.
                            Você pode baixar e usar gratuitamente este layout de template de site para o seu negócio de restaurante.
                            Você está autorizado a usar este template para fins comerciais.
                            <br><br>Você NÃO está autorizado a redistribuir o arquivo ZIP do template em qualquer site de download de templates. Por favor, entre em contato conosco para mais informações.</p>

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
                                          <li><a href='#tabs-1'><img src="assets/images/tab-icon-01.png" alt="">Café da Manhã</a></li>
                                          <li><a href='#tabs-2'><img src="assets/images/tab-icon-02.png" alt="">Almoço</a></a></li>
                                          <li><a href='#tabs-3'><img src="assets/images/tab-icon-03.png" alt="">Jantar</a></a></li>
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
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$10.50</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-02.png" alt="">
                                                            <h4>Suco de Laranja</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$8.50</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-03.png" alt="">
                                                            <h4>Salada de Frutas</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
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
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$6.50</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-05.png" alt="">
                                                            <h4>Dollma Pire</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$5.00</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-06.png" alt="">
                                                            <h4>Omelete com Queijo</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
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
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$14</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-05.png" alt="">
                                                            <h4>Dollma Pire</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$18</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-06.png" alt="">
                                                            <h4>Omelete de Queijo</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
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
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$10</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-02.png" alt="">
                                                            <h4>Suco de Laranja</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-03.png" alt="">
                                                            <h4>Sala de Frutas</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
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
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$14</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-03.png" alt="">
                                                            <h4>Suco de Laranja</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$18</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-02.png" alt="">
                                                            <h4>Salada de Frutas</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
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
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$8.50</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-01.png" alt="">
                                                            <h4>Dollma Pire</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$9</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-04.png" alt="">
                                                            <h4>Omelete de Queijo</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing elit, sed do.</p>
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
<section class="section" id="reservation">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="reservation-form">
                    <h2 class="form-title"><strong>Faça sua Reserva</strong></h2>
                    <form id="reservation" action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" id="name" name="name" placeholder="Seu Nome" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" id="email" name="email" placeholder="Seu Endereço de E-mail" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="phone" name="phone" placeholder="Número de Telefone" required>
                            </div>
                            <div class="col-md-6">
                                <select id="people" name="people" required class="form-control">
                                    <option value="" selected>Selecione o número de pessoas</option>
                                    <option value="1">01 Pessoa</option>
                                    <option value="2">02 Pessoas</option>
                                    <option value="3">03 Pessoas</option>
                                    <option value="4">04 Pessoas</option>
                                    <option value="5">05 Pessoas</option>
                                    <option value="6">06 Pessoas</option>
                                    <option value="7">07 Pessoas</option>
                                    <option value="8">08 Pessoas</option>
                                    <option value="9">09 Pessoas</option>
                                    <option value="10">10 Pessoas</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="date" id="date" name="date" required>
                            </div>
                            <div class="col-md-6">
                                <input type="time" id="time" name="time" required>
                            </div>
                            <div class="col-md-12">
                                <textarea id="message" name="message" rows="5" placeholder="Informações Adicionais ou Pedidos Especiais"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="form-submit-button">Fazer uma Reserva</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Reservation Area Ends ***** -->




        <!-- ***** Chefs Area Starts ***** -->
        <section class="section" id="chefs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4 text-center">
                        <div class="section-heading">
                            <h6>Nossos Cozinheiros</h6>
                            <h2>Oferecemos os melhores ingredientes para você</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="chef-item">
                            <div class="thumb">
                                <div class="overlay"></div>
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                                <img src="assets/images/chefs-01.jpg" alt="Chef #1">
                            </div>
                            <div class="down-content">
                                <h4>Randy Walker</h4>
                                <span>Chef de Confeitaria</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="chef-item">
                            <div class="thumb">
                                <div class="overlay"></div>
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                                <img src="assets/images/chefs-02.jpg" alt="Chef #2">
                            </div>
                            <div class="down-content">
                                <h4>David Martin</h4>
                                <span>Chef de Biscoitos</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="chef-item">
                            <div class="thumb">
                                <div class="overlay"></div>
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google"></i></a></li>
                                </ul>
                                <img src="assets/images/chefs-03.jpg" alt="Chef #3">
                            </div>
                            <div class="down-content">
                                <h4>Peter Perkson</h4>
                                <span>Chef de Panquecas</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                    <p>Entre em contato para mais informações, enviar sugestões ou esclarecer dúvidas. Estamos prontos para ajudar!</p>
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
                                <span><a href="#">hello@company.com</a><br><a href="#">info@company.com</a></span>
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
                                    <input name="name" type="text" id="name" placeholder="Seu Nome*" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="email" type="email" id="email" placeholder="Seu Endereço de E-mail*" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input name="subject" type="text" id="subject" placeholder="Assunto*" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" rows="8" id="message" placeholder="Sua Mensagem*" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-button-icon">Enviar Mensagem</button>
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

                        <br>Empresa Sediada em Natal-RN</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/aprimoramento.js"></script>
  </body>
</html>
