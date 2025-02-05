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
        Schema::create('pedido_itens', function (Blueprint $table) {
            $table->id("idPedidoItem");
            $table->foreignId('idPedido')->references('idPedido')->on('pedidos')->onDelete('cascade');
            $table->foreignId('idRefeicao')->references('idRefeicao')->on('refeicoes')->onDelete('cascade');
            $table->integer('quantidade');
            $table->decimal('valorUnitario', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_itens');
    }
};
