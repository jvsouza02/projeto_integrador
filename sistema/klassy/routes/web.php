<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\PratoController;

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
Route::post('/deletar_prato/{id}', [PratoController::class, 'deletarPrato'])->name('deletar_prato');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
