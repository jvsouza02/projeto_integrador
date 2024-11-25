<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/',  [HomeController::class, 'index'])->name('home');
Route::get('/redirects',  [HomeController::class, 'redirecionar'])->name('redirecionar');

Route::get('/users', [AdminController::class, 'mostrar_usuarios'])->name('admin.users');
Route::post('/deletar_usuario', [AdminController::class, 'deletar_usuario'])->name('admin.deletar_usuario');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
