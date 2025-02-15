<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/main-pagination.css">


    <title>Klassy</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-klassy-cafe.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">

    <style>
        /* Força a cor do texto em inputs do tipo time */
        #time-update {
            color: #000 !important;
        }

        /* Estiliza os componentes internos do input time */
        #time-update::-webkit-datetime-edit {
            color: #000 !important;
            /* Cor do texto */
        }

        #time-update::-webkit-datetime-edit-hour-field,
        #time-update::-webkit-datetime-edit-minute-field,
        #time-update::-webkit-datetime-edit-second-field,
        #time-update::-webkit-datetime-edit-ampm-field {
            color: #000 !important;
            /* Cor dos números */
        }

        /* Remove o estilo padrão do ícone */
        #time-update::-webkit-calendar-picker-indicator,
        #date-update::-webkit-calendar-picker-indicator {
            filter: invert(0);
            /* Mantém o ícone preto */
        }
    </style>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
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
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{ asset('assets/images/klassy-logo.png') }}" alt="Klassy Cafe HTML Template">
                        </a>

                        <!-- Menu -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Início</a></li>
                            <li class="scroll-to-section"><a href="{{ route('home', '#menu') }}">Cardápio</a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);">Reservas</a>
                                <ul>
                                    <li><a href="{{ route('home', '#reservation') }}">Fazer Reserva</a></li>
                                    <li><a href="{{ route('cliente.reservas') }}">Minhas Reservas</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="{{ route('home', '#about') }}">Sobre Nós</a></li>

                            <!-- Carrinho com Dropdown -->
                            <li class="submenu">
                                <a
                                    href="{{ route('mostrar_carrinho', Auth::check() ? Auth::user()->cliente->idCliente : 0) }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>{{ $carrinho_itens_count }}</span>
                                </a>
                                <ul>
                                    <li><a
                                            href="{{ route('mostrar_carrinho', Auth::check() ? Auth::user()->cliente->idCliente : 0) }}">Ver
                                            Carrinho</a></li>
                                    @if ($carrinho_itens_count > 0)
                                        <li><a href="{{ route('limpar_carrinho') }}">Limpar Carrinho</a></li>
                                    @endif
                                    <li><a href="{{ route('mostrar_pedidos') }}">Meus Pedidos</a></li>
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

    @yield('content')

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>

    <script>
        $(function() {
            $('#telefone').mask('(00) 00000-0000');
        })
    </script>

    <!-- Bootstrap -->

    <!-- Plugins -->
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/accordions.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/aprimoramento.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const menuItemsContainer = $('.owl-menu-item');

            menuItemsContainer.owlCarousel({
                items: 4,
                loop: true,
                dots: true,
                nav: true,
                margin: 30,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    },
                    1400: {
                        items: 5
                    }
                }
            });

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    const category = this.dataset.category;

                    fetch(`{{ route('filtrar.cardapio') }}?categoria=${category}`, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.text())
                        .then(html => {
                            // Destruir o carrossel
                            menuItemsContainer.trigger('destroy.owl.carousel')
                                .removeClass('owl-loaded owl-hidden');

                            // Substituir o conteúdo
                            menuItemsContainer.html(html);

                            // Reinicializar o Owl Carousel
                            menuItemsContainer.owlCarousel({
                                items: 4,
                                loop: true,
                                dots: true,
                                nav: true,
                                margin: 30,
                                responsiveClass: true,
                                responsive: {
                                    0: {
                                        items: 1
                                    },
                                    600: {
                                        items: 2
                                    },
                                    1000: {
                                        items: 3
                                    },
                                    1200: {
                                        items: 4
                                    },
                                    1400: {
                                        items: 5
                                    }
                                }
                            });
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>

</body>

</html>
