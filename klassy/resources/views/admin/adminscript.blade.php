<script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>

<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.maskMoney.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('admin/assets/js/misc.js') }}"></script>
<script src="{{ asset('admin/assets/js/settings.js') }}"></script>
<script src="{{ asset('admin/assets/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
<script>
    const inputImagem = document.getElementById('imagem');
    const previewImagem = document.getElementById('preview-imagem');

    inputImagem.addEventListener('change', () => {
        const file = inputImagem.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImagem.src = e.target.result;
            };
            reader.readAsDataURL(file);
            previewImagem.style.display = 'block';
        } else {
            previewImagem.src = "";
        }
    });
</script>

<script>
    $(document).ready(function() {
        // Aplica a máscara de dinheiro ao campo com id "valor"
        $('#preco').maskMoney({
            allowNegative: false, // Não permite valores negativos
            thousands: '.', // Separador de milhar
            decimal: ',', // Separador decimal
            affixesStay: true // Mantém o prefixo e sufixo visíveis
        });

        $('#salario').maskMoney({
            allowNegative: false, // Não permite valores negativos
            thousands: '.', // Separador de milhar
            decimal: ',', // Separador decimal
            affixesStay: true // Mantém o prefixo e sufixo visíveis
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.page-link').click(function() {
            $('.pagination').find('.active').removeClass('active');
            $(this).parent().addClass('active');
        });

        $(document).on('click', '.pagination-custom a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            $.ajax({
                url: "{{ route(Route::currentRouteName()) }}?page=" + page,
                success: function(data) {
                    $('.container').html($(data).find('.container').html());
                }
            });
        }
    });
</script>

@if (Route::currentRouteName() == 'gerente.relatorios')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sobrescreve as configurações globais do Chart.js para forçar os textos em branco
        Chart.defaults.color = '#fff';
        Chart.defaults.scale.ticks.color = '#fff';
        Chart.defaults.scale.title.color = '#fff';
        Chart.defaults.plugins.legend.labels.color = '#fff';
        Chart.defaults.plugins.tooltip.titleColor = '#fff';
        Chart.defaults.plugins.tooltip.bodyColor = '#fff';
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dados vindos do Controller
            const tipos_usuarios = {!! json_encode($tipos_usuarios) !!};
            const contagens_usuarios = {!! json_encode($contagens_usuarios) !!};

            const ctx = document.getElementById('usuarioChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: tipos_usuarios,
                    datasets: [{
                        data: contagens_usuarios,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#fff'
                            }
                        }
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dados vindos do Controller
            const categorias_pedidos = {!! json_encode($categorias_pedidos) !!};
            const totais_pedidos = {!! json_encode($totais_pedidos) !!};

            const ctx = document.getElementById('pedidosCategoriaChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: categorias_pedidos,
                    datasets: [{
                        data: totais_pedidos,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#fff'
                            }
                        }
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('pedidosChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        'Janeiro', 'Fevereiro', 'Março', 'Abril',
                        'Maio', 'Junho', 'Julho', 'Agosto',
                        'Setembro', 'Outubro', 'Novembro', 'Dezembro'
                    ],
                    datasets: [{
                        label: 'Pedidos por Mês',
                        data: @json(array_values($pedidos_meses)),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 159, 64, 0.7)',
                            'rgba(155, 89, 182, 0.7)',
                            'rgba(26, 188, 156, 0.7)',
                            'rgba(241, 196, 15, 0.7)',
                            'rgba(230, 126, 34, 0.7)',
                            'rgba(231, 76, 60, 0.7)',
                            'rgba(52, 152, 219, 0.7)'
                        ],
                        borderColor: 'rgba(255, 255, 255, 0.8)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleFont: {
                                size: 14
                            },
                            bodyFont: {
                                size: 14
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#fff',
                                font: {
                                    weight: 'bold'
                                },
                                stepSize: 1
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#fff',
                                font: {
                                    weight: 'bold'
                                }
                            },
                            grid: {
                                display: false
                            }
                        }
                    },
                    animation: {
                        duration: 1500,
                        easing: 'easeOutQuart'
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctxHora = document.getElementById('pedidosHoraChart').getContext('2d');

            new Chart(ctxHora, {
                type: 'line',
                data: {
                    labels: Array.from({
                        length: 24
                    }, (_, i) => `${i.toString().padStart(2, '0')}:00`),
                    datasets: [{
                        label: 'Pedidos por Hora',
                        data: @json($pedidos_horas),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 3,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        pointBackgroundColor: 'white',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                title: (context) => `Hora: ${context[0].label}`,
                                label: (context) => `Pedidos: ${context.raw}`
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Quantidade de Pedidos',
                                color: '#fff'
                            },
                            ticks: {
                                stepSize: 1,
                                color: '#fff'
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Horário do Dia',
                                color: '#fff'
                            },
                            ticks: {
                                maxRotation: 0,
                                autoSkip: true,
                                maxTicksLimit: 12,
                                color: '#fff'
                            },
                            grid: {
                                display: false
                            }
                        }
                    },
                    animation: {
                        duration: 1500,
                        easing: 'easeOutQuart'
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('receitaChart').getContext('2d');
            const meses = [
                'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
                'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
            ];

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: meses,
                    datasets: [{
                        label: 'Receita Mensal (R$)',
                        data: @json(array_column($receita_meses, 'total')),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 3,
                        pointRadius: 5,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: (context) => {
                                    const value = context.raw || 0;
                                    return `Receita: ${value.toLocaleString('pt-BR', {
                                    style: 'currency',
                                    currency: 'BRL'
                                })}`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Valor (R$)',
                                color: '#fff'
                            },
                            ticks: {
                                color: '#fff',
                                callback: (value) => {
                                    return value.toLocaleString('pt-BR', {
                                        style: 'currency',
                                        currency: 'BRL'
                                    });
                                }
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#fff' // ← Adicionado
                            },
                            title: {
                                display: true,
                                text: 'Meses',
                                color: '#fff'
                            },
                            grid: {
                                display: false
                            }
                        }
                    },
                    animation: {
                        duration: 1500,
                        easing: 'easeOutQuart'
                    }
                }
            });
        });
    </script>
@endif

<!-- End custom js for this page -->
