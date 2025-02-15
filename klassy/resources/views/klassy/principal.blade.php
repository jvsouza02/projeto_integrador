@extends('klassy.layout')

@section('content')
    <div>
        @if (@session('success'))
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>Klassy</h4>
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

    <!-- ***** Menu Area Starts ***** -->
    @include('klassy.cardapio')
    <!-- ***** Menu Area Ends ***** -->

    <!-- ***** Reservation Area Starts ***** -->
    @include('klassy.reserva')
    <!-- ***** Reservation Area Ends ***** -->

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
                        <form id="contact" action="{{ route('enviar_mensagem') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>Contate-Nos</h4>
                                </div>
                                <input type="text" name="id_cliente" id="id_cliente" hidden
                                    value="{{ Auth::check() ? Auth::user()->cliente->idCliente : '' }}">
                                <div class="col-lg-6 col-sm-12">
                                    <fieldset>
                                        <input name="nome" type="text" id="name" placeholder="Seu Nome*"
                                            required="" value="{{ Auth::check() ? Auth::user()->name : '' }}">
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="email" id="email"
                                            placeholder="Seu Endereço de E-mail*" required=""
                                            value="{{ Auth::check() ? Auth::user()->email : '' }}">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input name="assunto" type="text" id="subject" placeholder="Assunto*"
                                            required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="mensagem" rows="8" id="message" placeholder="Sua Mensagem*" required=""></textarea>
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
                        <p>Bem-vindo ao Klassy, onde a paixão pela gastronomia se une à excelência em atendimento para proporcionar experiências inesquecíveis. Somos um restaurante que valoriza a tradição e a inovação, oferecendo um ambiente acolhedor e sofisticado para que cada visita seja única.<br><br>Nossa equipe, dedicada e experiente, trabalha incansavelmente para transformar ingredientes selecionados em verdadeiras obras-primas culinárias. Do primeiro contato à última garfada, buscamos surpreender nossos clientes com sabores marcantes, apresentação impecável e um serviço que reflete nosso compromisso com a qualidade.<br><br>Venha nos visitar e descubra como o Klassy transforma cada refeição em um momento de celebração e sofisticação. Seja bem-vindo a um espaço onde o sabor encontra a excelência e cada detalhe é pensado para encantar você.
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
                        <p>® Klassy Restaurante
                            <br>Empresa Sediada em Natal-RN
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
