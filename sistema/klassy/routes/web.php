<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\PratoController;
use App\Http\Controllers\FuncionarioController;

/* =-=-=-= Controle de páginas =-=-=-= */
Route::get('/',  [PaginaController::class, 'index'])->name('home');
Route::get('/redirecionar',  [PaginaController::class, 'redirecionar'])->name('redirecionar');

/* =-=-=-= Gerente =-=-=-= */

// Tela de usuários
Route::get('/usuarios', [GerenteController::class, 'mostrarUsuarios'])->name('admin.usuarios');
Route::post('/deletar_usuario/{id}', [GerenteController::class, 'deletarUsuario'])->name('admin.deletar_usuario');
// Tela de cardápio
Route::get('/cardapio', [GerenteController::class, 'mostrarCardapio'])->name('admin.cardapio');
Route::post('/adicionar_prato', [PratoController::class, 'adicionarPrato'])->name('adicionar_prato');
Route::get('/editar_prato/{id}', [PratoController::class, 'editarPrato'])->name('editar_prato');
Route::post('/atualizar_prato/{id}', [PratoController::class, 'atualizarPrato'])->name('atualizar_prato');
Route::get('/deletar_prato/{id}', [PratoController::class, 'deletarPrato'])->name('deletar_prato');
// Tela de funcionários
Route::get('/funcionarios', [GerenteController::class, 'mostrarFuncionarios'])->name('admin.funcionarios');
Route::post('/cadastrar_funcionario', [FuncionarioController::class, 'cadastrarFuncionario'])->name('cadastrar_funcionario');
Route::get('/editar_funcionario/{id}', [FuncionarioController::class, 'editarFuncionario'])->name('editar_funcionario');
Route::post('/atualizar_funcionario/{id}', [FuncionarioController::class, 'atualizarFuncionario'])->name('atualizar_funcionario');
Route::get('/deletar_funcionario/{id}', [FuncionarioController::class, 'deletarFuncionario'])->name('deletar_funcionario');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
