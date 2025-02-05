<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carrinho_itens', function (Blueprint $table) {
            $table->id("idCarrinhoItem");
            $table->foreignId('idCarrinho')->references('idCarrinho')->on('carrinhos')->onDelete('cascade');
            $table->foreignId('idRefeicao')->references('idRefeicao')->on('refeicoes')->onDelete('cascade');
            $table->integer('quantidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrinho_itens');
    }
};
