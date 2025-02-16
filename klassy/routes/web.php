<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ContatosController;
use App\Http\Controllers\CozinheiroController;
use App\Http\Controllers\GarcomController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\RefeicaoController;
use App\Http\Controllers\FuncionarioController;

/* =-=-=-= Rotas Públicas =-=-=-= */
Route::get('/', [PaginaController::class, 'index'])->name('home');
Route::get('/filtrar-cardapio', [PaginaController::class, 'filtrar'])->name('filtrar.cardapio');
Route::post('/enviar_mensagem', [ContatosController::class, 'enviarMensagem'])->name('enviar_mensagem');


/* =-=-=-= Rotas do Cliente =-=-=-= */
Route::middleware(['auth', 'check.user.type:Cliente'])->group(function () {
    // Reservas
    Route::post('/reservar', [ReservaController::class, 'fazerReserva'])->name('reservar');
    Route::get('/cliente_reservas', [ReservaController::class, 'mostrarReservas'])->name('cliente.reservas');
    Route::post('/atualizar_reserva', [ReservaController::class, 'atualizarReserva'])->name('atualizar_reserva');
    Route::get('/cancelar_reserva/{id}', [ReservaController::class, 'cancelarReserva'])->name('cancelar_reserva');

    // Carrinho
    Route::get('/adicionar_carrinho/{id}', [CarrinhoController::class, 'adicionarCarrinho'])->name('adicionar_carrinho');
    Route::get('/carrinho/{id?}', [CarrinhoController::class, 'mostrarCarrinho'])->name('mostrar_carrinho');
    Route::post('/carrinho/atualizar', [CarrinhoController::class, 'atualizarCarrinho'])->name('carrinho_atualizar');
    Route::get('/remover_carrinho/{id}', [CarrinhoController::class, 'removerCarrinho'])->name('remover_carrinho');
    Route::get('/limpar_carrinho', [CarrinhoController::class, 'limparCarrinho'])->name('limpar_carrinho');

    // Pedidos
    Route::get('/finalizar_pedido', [PedidoController::class, 'finalizarPedido'])->name('finalizar_pedido');
    Route::get('/cliente_pedidos', [PedidoController::class, 'mostrarPedidos'])->name('mostrar_pedidos');
    Route::get('/cancelar_pedido/{id}', [PedidoController::class, 'cancelarPedido'])->name('cancelar_pedido');
});


/* =-=-=-= Rotas do Gerente =-=-=-= */
Route::prefix('gerente')->middleware(['auth', 'check.user.type:Gerente'])->group(function () {
    // Relatórios
    Route::get('/relatorios', [GerenteController::class, 'mostrarRelatorios'])->name('gerente.relatorios');

    // Usuários
    Route::get('/usuarios', [GerenteController::class, 'mostrarUsuarios'])->name('gerente.usuarios');
    Route::post('/deletar_usuario/{id}', [GerenteController::class, 'deletarUsuario'])->name('gerente.deletar_usuario');

    // Cardápio
    Route::get('/cardapio', [GerenteController::class, 'mostrarCardapio'])->name('gerente.cardapio');
    Route::post('/adicionar_refeicao', [RefeicaoController::class, 'adicionarRefeicao'])->name('adicionar_refeicao');
    Route::get('/editar_refeicao/{id?}', [RefeicaoController::class, 'editarRefeicao'])->name('editar_refeicao');
    Route::post('/atualizar_refeicao/{id}', [RefeicaoController::class, 'atualizarRefeicao'])->name('atualizar_refeicao');
    Route::get('/deletar_refeicao/{id}', [RefeicaoController::class, 'deletarRefeicao'])->name('deletar_refeicao');

    // Funcionários
    Route::get('/funcionarios', [GerenteController::class, 'mostrarFuncionarios'])->name('gerente.funcionarios');
    Route::post('/cadastrar_funcionario', [FuncionarioController::class, 'cadastrarFuncionario'])->name('cadastrar_funcionario');
    Route::get('/editar_funcionario/{id?}', [FuncionarioController::class, 'editarFuncionario'])->name('editar_funcionario');
    Route::post('/atualizar_funcionario/{id}', [FuncionarioController::class, 'atualizarFuncionario'])->name('atualizar_funcionario');
    Route::get('/deletar_funcionario/{id}', [FuncionarioController::class, 'deletarFuncionario'])->name('deletar_funcionario');

    // Pedidos
    Route::get('/pedidos', [GerenteController::class, 'mostrarPedidos'])->name('gerente.pedidos');

    // Reservas
    Route::get('/reservas', [GerenteController::class, 'mostrarReservas'])->name('gerente.reservas');

    // Mesas
    Route::get('/mesas', [GerenteController::class, 'mostrarMesas'])->name('gerente.mesas');
    Route::post('/cadastrar_mesa', [MesaController::class, 'cadastrarMesa'])->name('gerente.cadastrar_mesa');
    Route::post('/editar_mesa/{id}', [MesaController::class, 'editarMesa'])->name('gerente.editar_mesa');
    Route::get('/deletar_mesa/{id}', [MesaController::class, 'deletarMesa'])->name('gerente.deletar_mesa');

    // Contatos
    Route::get('/contatos', [GerenteController::class, 'mostrarContatos'])->name('gerente.contatos');
    Route::get('/deletar_mensagem/{id}', [ContatosController::class, 'deletarMensagem'])->name('deletar_mensagem');
});


/* =-=-=-= Rotas do Garçom =-=-=-= */
Route::prefix('garcom')->middleware(['auth', 'check.user.type:Garçom'])->group(function () {
    // Pedidos
    Route::get('/pedidos', [GarcomController::class, 'mostrarPedidos'])->name('garcom.pedidos');
    Route::get('/pedidos/cliente/{id?}', [GarcomController::class, 'mostrarPedidosCliente'])->name('garcom.pedidos_cliente');

    // Reservas
    Route::get('/reservas', [GarcomController::class, 'mostrarReservas'])->name('garcom.reservas');
    Route::post('/reservas/fazer_reservar', [GarcomController::class, 'fazerReserva'])->name('garcom.reservar');
    Route::get('/reservas/cancelar_reserva/{id}', [GarcomController::class, 'cancelarReserva'])->name('garcom.cancelar_reserva');

    // Alterar Status
    Route::post('/alterar_status', [PedidoController::class, 'alterarStatus'])->name('funcionarios.alterar_status');
});


/* =-=-=-= Rotas do Cozinheiro =-=-=-= */
Route::prefix('cozinheiro')->middleware(['auth', 'check.user.type:Cozinheiro'])->group(function () {
    Route::get('/pedidos', [CozinheiroController::class, 'mostrarPedidos'])->name('cozinheiro.pedidos');
});


/* =-=-=-= Dashboard (Redirecionamento Automático) =-=-=-= */
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();

        return match ($user->tipo_usuario) {
            'Gerente'    => redirect()->route('gerente.relatorios'),
            'Garçom'     => redirect()->route('garcom.pedidos'),
            'Cozinheiro' => redirect()->route('cozinheiro.pedidos'),
            default      => redirect()->route('home')
        };
    })->name('dashboard');
});
