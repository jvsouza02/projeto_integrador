<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CozinheiroController;
use App\Http\Controllers\GarcomController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\RefeicaoController;
use App\Http\Controllers\FuncionarioController;

/* =-=-=-= Controle de páginas =-=-=-= */
Route::get('/',  [PaginaController::class, 'index'])->name('home');

/* =-=-=-= Cliente =-=-=-= */
// Reserva
Route::post('/reservar', [ReservaController::class, 'fazerReserva'])->name('reservar');
Route::get('/cliente_reservas', [ReservaController::class, 'mostrarReservas'])->name('cliente.reservas');
Route::post('/atualizar_reserva', [ReservaController::class, 'atualizarReserva'])->name('atualizar_reserva');
Route::get('/deletar_reserva/{id}', [ReservaController::class, 'deletarReserva'])->name('deletar_reserva');
// Carrinho
Route::get('/adicionar_carrinho/{id}', [CarrinhoController::class, 'adicionarCarrinho'])->name('adicionar_carrinho');
Route::get('/carrinho/{id?}', [CarrinhoController::class, 'mostrarCarrinho'])->name('mostrar_carrinho');
Route::get('/remover_carrinho/{id}', [CarrinhoController::class, 'removerCarrinho'])->name('remover_carrinho');
Route::get('/limpar_carrinho', [CarrinhoController::class, 'limparCarrinho'])->name('limpar_carrinho');
// Pedido
Route::post('/finalizar_pedido', [PedidoController::class, 'finalizarPedido'])->name('finalizar_pedido');

/* =-=-=-= Gerente =-=-=-= */

// Tela de usuários
Route::get('/usuarios', [GerenteController::class, 'mostrarUsuarios'])->name('gerente.usuarios');
Route::post('/deletar_usuario/{id}', [GerenteController::class, 'deletarUsuario'])->name('gerente.deletar_usuario');
// Tela de cardápio
Route::get('/cardapio', [GerenteController::class, 'mostrarCardapio'])->name('gerente.cardapio');
Route::post('/adicionar_refeicao', [RefeicaoController::class, 'adicionarRefeicao'])->name('adicionar_refeicao');
Route::get('/editar_refeicao/{id}', [RefeicaoController::class, 'editarRefeicao'])->name('editar_refeicao');
Route::post('/atualizar_refeicao/{id}', [RefeicaoController::class, 'atualizarRefeicao'])->name('atualizar_refeicao');
Route::get('/deletar_refeicao/{id}', [RefeicaoController::class, 'deletarRefeicao'])->name('deletar_refeicao');
// Tela de funcionários
Route::get('/funcionarios', [GerenteController::class, 'mostrarFuncionarios'])->name('gerente.funcionarios');
Route::post('/cadastrar_funcionario', [FuncionarioController::class, 'cadastrarFuncionario'])->name('cadastrar_funcionario');
Route::get('/editar_funcionario/{id}', [FuncionarioController::class, 'editarFuncionario'])->name('editar_funcionario');
Route::post('/atualizar_funcionario/{id}', [FuncionarioController::class, 'atualizarFuncionario'])->name('atualizar_funcionario');
Route::get('/deletar_funcionario/{id}', [FuncionarioController::class, 'deletarFuncionario'])->name('deletar_funcionario');
// Tela de Pedidos
Route::get('/pedidos', [GerenteController::class, 'mostrarPedidos'])->name('gerente.pedidos');
// Tela de reservas
Route::get('/reservas', [GerenteController::class, 'mostrarReservas'])->name('gerente.reservas');

/* =-=-=-= Garçom =-=-=-= */

// Tela de pedidos
Route::get('/pedidos', [GarcomController::class, 'mostrarPedidos'])->name('garcom.pedidos');
// Tela de clientes
Route::get('/clientes', [GarcomController::class, 'mostrarClientes'])->name('garcom.clientes');

/* =-=-=-= Cozinheiro =-=-=-= */

// Tela de pedidos
Route::get('/pedidos', [CozinheiroController::class, 'mostrarPedidos'])->name('cozinheiro.pedidos');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
