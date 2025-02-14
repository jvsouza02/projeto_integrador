@extends('admin.admin_principal')

@section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="row mb-5">
            <div class="col-12">
                <h1 class="display-5 fw-bold text-center text-gradient-primary">
                    <span class="text-4xl font-bold">Relatórios</span>
                </h1>
            </div>
        </div>

        <!-- Primeira Linha de Gráficos -->
        <div class="row g-4 mb-5">
            <!-- Receita por Mês -->
            <div class="col-lg-6 col-xxl-4">
                <div class="card shadow-lg h-100">
                    <div class="card-header bg-transparent border-bottom">
                        <h3 class="h4 fw-bold mb-0">📈 Receita Mensal</h3>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart-container" style="height: 350px">
                            <canvas id="receitaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Usuários -->
            <div class="col-lg-3 col-xxl-4">
                <div class="card shadow-lg h-100">
                    <div class="card-header bg-transparent border-bottom">
                        <h3 class="h4 fw-bold mb-0">👥 Perfil de Usuários</h3>
                    </div>
                    <div class="card-body p-3 d-flex flex-column">
                        <div class="chart-container flex-grow-1">
                            <canvas id="usuarioChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Categorias -->
            <div class="col-lg-3 col-xxl-4">
                <div class="card shadow-lg h-100">
                    <div class="card-header bg-transparent border-bottom">
                        <h3 class="h4 fw-bold mb-0">🍽️ Pedidos por Categoria</h3>
                    </div>
                    <div class="card-body p-3 d-flex flex-column">
                        <div class="chart-container flex-grow-1">
                            <canvas id="pedidosCategoriaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Segunda Linha de Gráficos -->
        <div class="row g-4">
            <!-- Pedidos por Mês -->
            <div class="col-lg-6">
                <div class="card shadow-lg h-100">
                    <div class="card-header bg-transparent border-bottom">
                        <h3 class="h4 fw-bold mb-0">📦 Pedidos Mensais</h3>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart-container" style="height: 350px">
                            <canvas id="pedidosChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pedidos por Hora -->
            <div class="col-lg-6">
                <div class="card shadow-lg h-100">
                    <div class="card-header bg-transparent border-bottom">
                        <h3 class="h4 fw-bold mb-0">🕒 Pedidos por Hora</h3>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart-container" style="height: 350px">
                            <canvas id="pedidosHoraChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
